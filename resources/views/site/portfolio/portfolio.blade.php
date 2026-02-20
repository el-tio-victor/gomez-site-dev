@extends('layouts.site')

@section('css')
<!--    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">  -->
<link rel="stylesheet" href="{{asset(MyHelpers::versionAuto('/css/portfolio.css'))}}">

@endsection

@section('header')
        @component('site.partials._header')
            <div class='header-intr d-flex flex-column align-items-center justify-content-center'>
                <img class='col-10 col-sm-8 col-md-6 col-lg-5 header-intr_img' src="{{asset('images/page/shape1.svg')}}" alt="">
                <h1 class='text-center title-portfolio'>
                    Echa un vistazo a mis proyectos
                </h1>
            </div>
        @endcomponent
@endsection

@section('title','Portafolio')

@section('content')
    <section class="pt-5 pb-5 mb-3 d-flex justify-content-center  bg-white nav-categories-wrapper">
        @include('site.portfolio.partials._nav-categories') 
    </section >

    
    <!--<section class='pt-5 mb-5 d-flex flex-column  justify-content-center align-items-center  works-container'> -->
    <section class=" mt-5 pt-5 d-flex flex-wrap col-12">
    @foreach($works as $work)
        
        @component('site.portfolio.partials.work')
                @slot('title',$work->title)
                @slot('services', $work->services)
                @slot('detail',$work->detail)
                @slot('url', $work->url )
                @slot('images', $work->images()->where('image_main',1)->get() )
                @slot('tt', $work->technologyTool)
		            @slot('work_slug', $work->slug )
                @slot('work_category', $work->categoryWork->categoryWork_name )
                @slot('index',$loop->index)
	    @endComponent
    @endforeach

        @if( count($works) > 0)
            <div class='col-12 d-flex justify-content-center mb-3 mt-5 pb-3 pt-5'>
                {{ $works->links()}}
            </div>
        @else
	      @component('site.partials._no-results')@endcomponent
        @endif
        @include('site.home.partials._svg-decline',['color'=>'#fff','class'=>''])
    </section>
    
@endsection

@section('footer')
    @include('site.partials._footer')
@endsection

@section('js')
    <script src="{{asset('js/snap/snap.svg.js') }}"></script>
    <script src="{{asset('js/anim-slide.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
    <script>
        //prueba libreria parallax
        var image = document.getElementsByClassName('header-intr_img');
        console.log(image);
        new simpleParallax(image,{
            overflow: true,
            orientation: 'down',
            scale: 1.9
        });

        var slash_top, slash_bottom, slash_middle, btn_menu,nav_main

            window.onload = function(){
            btn_menu        = document.querySelector('.btn-menu')
            slash_top       = btn_menu.querySelector('.slash-top')
            slash_bottom    = btn_menu.querySelector('.slash-bottom')
            slash_middle    = btn_menu.querySelector('.slash-middle')
            btn_menu.addEventListener('click',showMenu)
            nav_main = document.querySelector('.navbar-main')
            document.querySelector('.contain-page').style.opacity=1
            document.querySelector('.preloader').classList += ' preloader-inactive'


            for (let index = 0; index < btn_view_detail_work.length; index++) {
                btn_view_detail_work[index].addEventListener('click',showDetailWork); 
            }
            
        }
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

    </script>
@endsection
