<?php
    namespace App\Http\ViewComposers;

    
    use Illuminate\View\View;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use Illuminate\Support\Arr;

    class IndexArticlesComposer{

        protected $articles;
        protected $totals_art;

        public function __construct(){
            $this->articles = DB::table('articles')
            ->join('article_image','articles.id','=','article_id')
            ->join('images','images.id','=','image_id')
            ->join('categories','categories.id','=','articles.category_id')
            ->select('articles.*','images.name as image_name','categories.name as category_name')
            ->where('status','published')
            ->orderBy('id','desc')
            ->skip(0)->take(2)->get();

            $this->totals_art =  Arr::first( DB::select('call totales_articulos(?)',['published']) )->total_art;
        }

        public function compose(View $view){
            //dd($this->articles);
            $view->with(['articles' => $this->articles, 'totales_articulos' => $this->totals_art] );
        }
    }
    
