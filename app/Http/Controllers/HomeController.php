<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Article;
use App\Models\Category;

use Carbon\Carbon;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user() == null)
            $articles = Article::where('status', 'published')->orderBy('id', 'desc')->simplePaginate(9);
        else
            $articles = Article::where('status', 'published')->orWhere([
                ['status', '=', 'edited'],
                ['user_id', '=', auth()->user()->id]
            ])->orderBy('id', 'desc')->simplePaginate(9);
        $filter = collect(['filter' => 'all']);

        return view('site.blog.blog')
            ->with('filter', $filter)
            ->with('articles', $articles);
    }

    public function searchCategory($slug)
    {
        /*Buscar articulos por categoria */
        $category = \App\Models\Category::where('category_slug', '=', $slug)->first();
        /*$articles = \App\Article::where('category_slug',$slug)
        ->leftJoin('categories','categories.id','=','articles.category_id')
	->simplePaginate(4);*/
        //dd(\App\Category::findBySlug($slug)->name  );
        $articles = $category->articles()->orderBy('id', 'DESC')->simplePaginate(4);
        $category_name = \App\Models\Category::findBySlug($slug)->name;

        $filter = collect(['filter' => 'category', 'category_name' => $category_name]);


        return view('site.blog.blog')
            ->with('filter', $filter)
            ->with('articles', $articles);
    }

    public function searchTag($slug)
    {
        //$tag = \App\Tag::where('category_id',$id)->get();
        $tags = \App\Models\Tag::where('tag_slug', '=', $slug)->first();
        $tag_name = $tags->name;
        $articles = $tags->articles()->orderBy('id', 'DESC')->simplePaginate(4);

        $filter = collect(['filter' => 'tag', 'tag_name' => $tag_name]);

        return view('site.blog.blog')
            ->with('filter', $filter)
            ->with('articles', $articles);
    }

    public function relations($rel)
    {
        return $rel->each(function ($rel) {
            $rel->category;
            $rel->tags;
            $rel->images;
        });
    }
    public function relationTag()
    {
        $tags = \App\Models\Tag::where('id', '=', $id)->first();
        return $rel = $tags->articles()->get();
    }

    public function msg(ContactRequest $r)
    {

        if ($r->ajax()) {

            Mail::to('victormgomez13@gmail.com')->send(new \App\Mail\Message($r->msg, $r->name, $r->mail));
        }
    }
}
