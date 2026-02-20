@extends('layouts.site')

@section('css')
<!--<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">-->
<link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection

@section('title','Inicio')

@section('header')
@component('site.partials._header')

<div class='header-intro'>
    <h1>Gomez-Site</h1>
    <h2 class=' d-flex flex-column'>
        <div class='text-right'><span>by</span> víctor gómez</div>
        @include('site.partials._social-links', ['class'=>'pr-3'])
    </h2>

</div>
@endcomponent
@endsection

@section('content')
<img class="img-roll" src="{{asset('/images/page/shape.svg')}}" alt="">
<section class="about">
    <div class=" container about-me">

        <div class=' position-relative d-flex justify-content-center  flex-row align-items-center '>
            <img class='about-img ' src="{{asset('/images/page/pintura.svg')}}" alt="">
            <div class='position-relative pr-5 col-12 col-md-6 col-lg-5 mb-md-5 about-me-wrapper '>
                <h2 class='subt'>¿Qué cosa es víctor?</h2>
                <p class=' mt-4 pr-4 about-me-text '>
                    Desarrollador web, entusiasta del diseño y apacionado de la programación.
                    Fiel creyente de que las cosas bien hechas son las mejores
                    y las que sobresalen del resto.
                </p>
            </div>

        </div>

    </div>
    <div class="about-skills  mb-5 container">
        <div class="position-relative">
            <img class="about-skill_img_tit" src="{{asset('/images/page/shape1.svg')}}" alt="">
            <h2 class='col-12 col-md-6 col-lg-5 mt-5 mb-5 subt'>Y sus habilidades</h2>
        </div>
        <div class="margin-top-bott-elem skills-wrapper">
            <div class="d-flex flex-column flex-sm-row  justify-content-around skills1">
                <div class=' d-flex justify-content-center align-items-center mr-lg-5 skill'>
                    <h3>HTML</h3>
                </div>
                <div class='  d-flex justify-content-center align-items-center mr-lg-5  skill'>
                    <h3>CSS</h3>
                </div>
                <div class=' d-flex justify-content-center align-items-center mr-lg-5 skill'>
                    <h3>JAVASCRIPT</h3>
                </div>
            </div>
            <div class="d-flex d-flex flex-column flex-sm-row  justify-content-around  skills2">
                <div class='d-flex justify-content-center align-items-center  mr-lg-5 skill'>
                    <h3>PHP</h3>
                </div>
                <div class=' d-flex justify-content-center align-items-center mr-lg-5 skill'>
                    <h3>SQL</h3>
                </div>

            </div>
        </div>
    </div>

    <div class="container   about-footer">
    </div>
</section>
<section class='position-relative works '>

    <img class="works_img_bg" src="{{asset('/images/page/shape2.svg')}}" alt="">
    <header class=" container-fluid pb-4 bg-white works-header">
        <h2 class='pt-md-5 ml-5  mb-5 pb-5 subt'>Últimos <br> proyectos</h2>
        <!--<div class="margin-top-bott-elem d-flex  flex-column  justify-content-center align-items-center works-intro">
                <div class='m-0 text-center'><p>Estos son los últimos  de mis proyectos desarrollados.</p></div>
            </div>-->
    </header>
    <section class='col-12 p-0  works-contain bg-white mt-5 mb-4 pt-5 pb-5
            container-fluid d-flex flex-wrap   justify-content-center align-items-center'>
        @include('site.home.partials.contentWorks')
    </section>
    <div class="pt-5 pb-5 d-flex align-items-center justify-content-center bg-white">
        <a href="{{route('portfolio')}}">
            <div class=" d-flex align-items-center justify-content-center btn-flat">
                <span class='btn-text'>VER PORTAFOLIO</span>
            </div>
        </a>
    </div>
</section>
@include('site.partials._pre-footer')
@endsection

@section('footer')
@include('site.partials._footer')
@endsection

@section('js')
<script src="{{asset('js/snap/snap.svg.js') }}"></script>
<script src="{{asset('js/anim-slide.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>


<script>
    var slash_top, slash_bottom, slash_middle, btn_menu, nav_main

    window.onload = function() {

        //prueba libreria parallax
        var image = document.getElementsByClassName('about-img');
        console.log(image);
        new simpleParallax(image, {
            overflow: true,
            orientation: 'down'
        });

        btn_menu = document.querySelector('.btn-menu')
        slash_top = btn_menu.querySelector('.slash-top')
        slash_bottom = btn_menu.querySelector('.slash-bottom')
        slash_middle = btn_menu.querySelector('.slash-middle')
        btn_menu.addEventListener('click', showMenu)
        nav_main = document.querySelector('.navbar-main')
        document.querySelector('.contain-page').style.opacity = 1
        document.querySelector('.preloader').classList += ' preloader-inactive'

        for (let index = 0; index < btn_view_detail_work.length; index++) {
            btn_view_detail_work[index].addEventListener('click', showDetailWork);
        }

    }

    window.addEventListener('scroll', function() {
        if (window.scrollY > 80) {
            nav_main.classList.add('scroll-page')
        } else {
            nav_main.classList.remove('scroll-page')
        }
    })


    function showMenu() {
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