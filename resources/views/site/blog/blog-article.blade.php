@extends('layouts.site')

@section('title' )
{{$article->title}}
@endsection
@section('css')
        <!--<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">-->
        <link rel="stylesheet" href="{{asset('/css/blog-article.css')}}">
        {{--<link rel="stylesheet" href="{{asset(MyHelpers::versionAuto('/css/blog-article.css'))}}">--}}
        <style>
            .collapse{
                display:none;
            }
            .collapse.show{
                display:block;
            }
        </style>
@endsection

@section('header')
        @component('site.partials._header')
        @endcomponent
@endsection

@section('content')
    @include('site.blog.partials.nav-blog')
    <section class=' container col-11 col-sm-10 col-md-8 d-flex flex-column flex-lg-row 
      justify-content-between align-items-center pt-4 mt-5 mt-sm-4 mb-3'> 
        <article class='col '>
            <header class="">
                <h1 class='m-0 pb-3 article-title'>
                    {{$article->title}}
                </h1>
                <span class=" ml-1 badge badge-pill bg-naranja article-category">
                    {{$article->category->name}}
                </span>
            </header>
            <section>
                <div class="mt-3 ml-auto mr-auto mb-3 col-md-6 blog-article-img">
                    <img class='article-img' src="{{asset('images/articles/'.$article->images[0]->name)}}" alt="">
                </div>
                <div>
                    {!!$article->content!!}
                </div>
            </section>
            <footer class=''>
                <section class="mt-3 article-tags">
                    @foreach($article->tags as $tag)
                        <span class="badge badge-secondary">
                            <i class="icon-price-tag"></i>
                            {{$tag->name}}
                        </span>
                    @endforeach
                </section>
		<div class="mt-5 mb-5 d-flex align-items-center justify-content-center">
		  <a href="{{route('blog')}}">
		    @component('dashboard.partials._btn-flat')
		      @slot('text_link','REGRESAR A POSTS')
		    @endcomponent 
		  </a>
		</div>
            </footer>
        </article>
    </section>
@endsection

@section('footer')
    @include('site.partials._footer')
@endsection

@section('js')
    <script src="{{asset('js/prismjs/prism.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script>
        var slash_top, slash_bottom, slash_middle, btn_menu,nav_main
        window.onload = function(){
             /**Variables menu burger */
             btn_menu        = document.querySelector('.btn-menu')
            slash_top       = btn_menu.querySelector('.slash-top')
            slash_bottom    = btn_menu.querySelector('.slash-bottom')
            slash_middle    = btn_menu.querySelector('.slash-middle')
            btn_menu.addEventListener('click',showMenu)
            nav_main = document.querySelector('.navbar-main')
            document.querySelector('.contain-page').style.opacity=1
            document.querySelector('.preloader').classList += ' preloader-inactive'

            $('.link-sub-blog').click(function(){
                let el = $(this)
                let attr_href = el.attr('href')

                el.toggleClass('active')
                let links_sub_not = $('.link-sub-blog.active'+":not(a[href='"+attr_href+"'])")
                console.log(links_sub_not)
                links_sub_not.each(function(){
                    $(this).toggleClass('active')
                })
                //busco los contenedores del collapse que estan visibles y que no corresponden 
                //al clickeado y los oculto
                let collapses = $('.collapse.show'+':not('+attr_href+')')
                console.log(collapses)
                collapses.each(function(){
                    $(this).toggleClass('show')
                })
            })

            window.addEventListener('scroll' ,function(){
                if( window.scrollY > 80 ){
                    nav_main.classList.add('scroll-page')
                }
                else{
                    nav_main.classList.remove('scroll-page')
                }
            }) 

            function showMenu(){
                btn_menu.classList.toggle('active')
                let cont_menu = document.querySelector('.nav-main-items')
                cont_menu.classList.toggle('active')

                //slash de boton menu
                slash_top.classList.toggle('active')
                slash_bottom.classList.toggle('active')
                slash_middle.classList.toggle('active')
            }
        }
    </script>
@endsection
