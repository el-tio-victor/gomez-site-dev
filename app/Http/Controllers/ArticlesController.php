<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Redirect;
//use Laracasts\Flash;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        //dd(Auth::user()->id);

        $articles = Article::SearchArticle($r->title)
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(
                15
            );
        $articles->each(function ($articles) {
            $articles->category;
            $articles->user;
        });
        return view('dashboard.blog.articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('id', 'ASC')->pluck('name', 'id');
        return view('dashboard.blog.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {


        $article = new Article($request->all());
        $content_sumary = $this->character_limiter($article->content);
        $article->summary = $content_sumary;
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = "blog_" . time() . "." . $file->getClientOriginalExtension();
            $path = public_path() . "/images/articles/";
            $file->move($path, $name);

            $image = new \App\Models\Image();
            $image->name = $name;
            $image->save();


            $article->images()->attach($image->id);
        }


        flash('Articulo creado con exito')->success();

        return redirect()->route('articles.index');
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
        $article = Article::find($id);
        $article->category;
        $categories = Category::orderBy('id', 'DESC')->get()->pluck('name', 'id');
        $tags = Tag::orderBy('id', 'DESC')->get()->pluck('name', 'id');
        $article_tags = $article->tags->pluck('id')->ToArray();
        return view('dashboard.blog.articles.edit')
            ->with('article', $article)
            ->with('categories', $categories)
            ->with('article_tags', $article_tags)
            ->with('tags', $tags);
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
        $article = Article::find($id);

        //dd($request->all());
        $article->fill($request->all());
        $article->summary = $this->character_limiter($request->content);
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title, ['unique' => false]);
        $article->slug = $slug;
        $article->save();

        $article->tags()->sync($request->tags);

        flash('Campo Modificado ')->success();
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        flash('Articulo eliminado satisfactoriamente')->success();
        return redirect()->route('articles.index');
    }


    function character_limiter($str, $n = 130, $end_char = '...')
    {
        if (strlen($str) < $n) {
            return $str . $end_char;
        }

        $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

        if (strlen($str) <= $n) {
            return $str . $end_char;
        }

        $out = "";
        foreach (explode(' ', trim($str)) as $val) {
            $out .= $val . ' ';

            if (strlen($out) >= $n) {
                $out = trim($out);
                return (strlen($out) == strlen($str)) ? $out . $end_char : $out . $end_char;
            }
        }
    }
    public function viewArticle($slug)
    {
        $article = Article::findBySlugOrFail($slug);
        $article->categories;
        $article->images;
        $article->tags;
        //dd($article->title);
        return view('site.blog.blog-article')
            ->with('article', $article);
    }
}
