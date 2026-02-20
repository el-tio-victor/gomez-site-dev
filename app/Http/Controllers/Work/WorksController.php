<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Works\WorkRequest;
use App\Models\Work;
use App\Models\Image;

use Laracasts\Flash;
use App\Models\CategoryWork;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::orderBy('id', 'Desc')->paginate(4);
        //dd($works[0]);
        return view('dashboard.works.work.index')->with('works', $works);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryWork = CategoryWork::all()->pluck('categoryWork_name', 'id')->toArray();
        return view('dashboard.works.work.create')
            ->with('categoryWork', $categoryWork);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {

        //dd($request->input());
        $work = new Work($request->all());

        /*$work->title = $request->input('title');
        $work->detail = $request->input('detail');
        $work->url = $request->input('url');*/

        if ($work->save()) {
            //guardo imagen principal
            if ($request->file('img')) {

                $file = $request->file('img');
                $name = "work_" . time() . "." . $file->getClientOriginalExtension();
                $path = public_path() . "/images/works/";
                $file->move($path, $name);

                $image = $this->guardaImagen($name);

                $work->images()->attach($image->id, ['image_main' => 1]);
            }
            //Guardo imágenes generales
            if ($request->file('imgs')) {
                foreach ($request->file('imgs') as $img_gral) {

                    $file_gral = $img_gral;
                    $name_gral = "work_" . uniqid() . "." . $file_gral->getClientOriginalExtension();
                    $path = public_path() . "/images/works/";

                    $file_gral->move($path, $name_gral);

                    $image = $this->guardaImagen($name_gral);
                    $work->images()->attach($image->id);
                }
            }
        }


        $work->technologyTool()->sync($request->techs);


        flash('Articulo creado con exito')->success();
        return redirect()->route('works.index');
    }

    protected function guardaImagen($name)
    {
        $image = new Image();
        $image->name = $name;
        $image->save();

        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $categoriesWork  = CategoryWork::orderBy('categoryWork_name', 'ASC')->get();
        $works = Work::orderBy('id', 'Desc')->paginate(6);
        return view('site.portfolio.portfolio')
            ->with('works', $works)->with('categoriesWork', $categoriesWork)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        $categoryWork = CategoryWork::all()->pluck('categoryWork_name', 'id')->toArray();
        return view('dashboard.works.work.edit')
            ->with('work', $work)
            ->with('categoryWork', $categoryWork)
            ->with('id_work', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $work = Work::find($id);
        $work->fill($request->all());
        $work->save();

        $work->technologyTool()->sync($request->techs);
        flash('Campo Modificado')->success();
        return redirect()->route('works.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::find($id);
        //dd($id);
        $work->delete();

        flash('Elemento eliminado')->error();
        return redirect()->route('works.index');
    }

    public function searchWorks($slug)
    {
        $categoriesWork  = CategoryWork::orderBy('categoryWork_name', 'ASC')->get();
        $category = \App\Models\CategoryWork::where('categoryWork_slug', $slug)->first();
        $works      = $category->work()->paginate(4);

        return view('site.portfolio.portfolio')
            ->with('works', $works)
            ->with('categoriesWork', $categoriesWork)
            ->with('slug', $slug);
    }

    public function viewWork($slug)
    {
        $work               = Work::where('slug', $slug)->first();
        $work_image_main    = $work->images()->where('image_main', 1)->first();
        $work_images        = $work->images()->whereNull('image_main')->orWhere('image_main', 0)->orderBy('image_order')->get();
        $work_techs         = $work->technologyTool()->get();
        //dd($work_techs[0]->technology->technology_name);
        return view('site.portfolio.work')
            ->with(['work' => $work, 'work_image_main' => $work_image_main, 'work_techs' => $work_techs, 'work_images' => $work_images]);
    }
}
