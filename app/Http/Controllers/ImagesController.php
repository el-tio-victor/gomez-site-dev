<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{
    public function index(){
        $images = Image::all();
        $images= DB::table('images')
            ->join('article_image','article_image.image_id','=','images.id')
            ->join('articles','article_image.article_id','=','articles.id')
            ->select('images.name','articles.title')
            ->get();
        //dd($images);
        
       
      /*foreach($images as $image){
           $salida=$image->name;
           foreach($image->articles as $i){
               $salida=$salida.'....'.$i->title;
               dd($salida);
           }
       }*/
            
        
        //dd($images);
        return view('dashboard.blog.images.index')->with('images',$images);
    }
     public function store(Request $r){
        //dd($r->file( time() ));
        if( $r->file('image') ){
            $path = public_path()."/images/articles/generals/";
            $path_date = $path.date('m-Y'); 
            //dd( $path_date );
            if(!file_exists($path_date)){
                mkdir( $path_date,0777,true);
            }
            $file = $r->file('image');
            $name = "generals_".time(). "." .$file->getClientOriginalExtension();
            $file -> move($path_date,$name);
        }
        return redirect()->route('images.index');
    }
    public function indexGenerals(){
        $result =['status'=>false];
        $path = public_path()."/images/articles/generals/".date('m-Y');
        //dd(public_path());
        if(file_exists($path)){
            $d = dir($path);
            //dd($d);
            while(($file = $d->read()) != false){
                if( preg_match("([^\s]+(\.(?i)(gif|jpg|png|svg))$)",$file) )
                $imgs[]= date('m-Y')."/".$file;
            }
            $result =['imgs'=>$imgs,'status'=>true];
            $d->close();
            
        }
        return view('dashboard.blog.images.indexGenerals')->with('imgs',$result);
    }
}
