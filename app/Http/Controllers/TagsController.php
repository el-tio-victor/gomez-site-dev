<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\TagRequest;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {

	$tags =  Tag::SearchTag($r->name)->orderBy('id','ASC')->paginate(4);
        return view('dashboard.blog.tags.index')->with('tags',$tags)
        ->with('tag_edit',null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dashboard.blog.tags.create')->with('categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $r)
    {
        $tag = new Tag($r->all());
        $tag->save();
        flash('El tag fue agregado con exito')->success();
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags =  Tag::orderBy('id','ASC')->paginate(4);
        $tag = Tag::find($id);
        return view('dashboard.blog.tags.index')->with('tag_edit',$tag)->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $r, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($r->all());
        $tag->save();
        flash('Tag actualizado con exito')->success();
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tag = Tag::find($id);
        $tag->delete();

        flash('El tag fue eliminada con exito')->success();
        return redirect()->route('tags.index');
    }
}
