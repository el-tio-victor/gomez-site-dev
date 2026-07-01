@extends('layouts.site')

@section('css')
    <!--<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">-->
    <link rel="stylesheet" href="{{ asset(MyHelpers::versionAuto('/css/main.css')) }}">
@endsection

@section('title', 'Inicio')

@section('header')
    @component('site.partials._header')
        <div class='header-intro'>
            <h1>
                <div class="d-flex flex-column">
                    <span class="item-name"> Victor </span>
                    <span class="item-name2"> Manuel </span>
                    <span class="position-relative last">Gómez </span>
                </div>
            </h1>
            <h2 class=' d-flex flex-column mt-2'>
                <div class='text-center'><small>gomez-site.mx</small></div>
                @include('site.partials._social-links', ['class' => 'pr-3'])
            </h2>

        </div>
    @endcomponent
@endsection

@section('content')
    <section class="about">
        <div class="bg-white container about-me">

            <div class=' position-relative d-flex justify-content-center  flex-column flex-md-row align-items-center '>
                <img class='about-img ' src="{{ asset('/images/page/face.svg') }}" alt="">
                <div
                    class='position-relative pr-3 pr-sm-5 pl-3 pl-sm-5 pl-md-4 col-12 col-md-6 col-lg-5 mb-md-5 about-me-wrapper '>
                    <h2 class='subt'>Algo sobre mi...</h2>
                    <p class=' mt-4  about-me-text '>
                        Soy desarrollador de software y creo herramientas tecnológicas que optimizan
                        procesos y facilitan el día a día de personas y empresas en la ciudad de Puebla México.
                        <span role="img" aria-label="Alert">‼️</span> No soy dieñador pero tengo una fuerte debilidad,
                        por el como se ven mis
                        desarrollos.
                    </p>
                </div>
            </div>
            <div class="pt-5 d-flex align-items-center text-center">
                <div class="col-3">
                    <span>
                        <svg width="90" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.1945 6H14.25V7.5H15.8055L16.0362 10.5H13.5H12.9343H9V9.75H9.75V8.25H6V9.75H7.5V11.145L7.0383 12.7609C6.94315 12.7537 6.847 12.75 6.75 12.75C4.67893 12.75 3 14.4289 3 16.5C3 18.5711 4.67893 20.25 6.75 20.25C8.56422 20.25 10.0775 18.9617 10.425 17.25H12.5657L14.0657 12H16.1516L16.2203 12.8931C14.6499 13.3406 13.5 14.786 13.5 16.5C13.5 18.5711 15.1789 20.25 17.25 20.25C19.3211 20.25 21 18.5711 21 16.5C21 14.5867 19.5671 13.0081 17.716 12.7787L17.1945 6ZM6.61165 14.2542L6.02886 16.294L7.47114 16.706L8.05397 14.6662C8.62657 15.074 9 15.7434 9 16.5C9 17.7426 7.99264 18.75 6.75 18.75C5.50736 18.75 4.5 17.7426 4.5 16.5C4.5 15.3038 5.43344 14.3257 6.61165 14.2542ZM8.48075 13.1724L8.81573 12H12.5057L11.4343 15.75H10.425C10.1971 14.6273 9.46767 13.6868 8.48075 13.1724ZM16.3395 14.4419L16.5022 16.5575L17.9978 16.4425L17.835 14.3268C18.794 14.5843 19.5 15.4597 19.5 16.5C19.5 17.7426 18.4926 18.75 17.25 18.75C16.0074 18.75 15 17.7426 15 16.5C15 15.5814 15.5504 14.7914 16.3395 14.4419Z"
                                    fill="#83807b"></path>
                            </g>
                        </svg>
                    </span>
                </div>
                <div class="col-6">
                    <span>
                        <svg height="70px" width="70px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#83807b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#83807b;} </style> <g> <path class="st0" d="M264.144,416.889L14.642,205.12L0,222.38l249.532,211.798l0.034,0.03 c28.365,23.868,64.366,37.003,101.443,37.01h159.922v-22.638H351.01C319.292,448.581,288.402,437.322,264.144,416.889z"></path> <path class="st0" d="M203.394,336.186l56.013,47.136c-2.07-10.412-6.623-21.543-15.617-31.812 c-6.968-7.966-21.928-24.401-39.924-44.533C203.397,316.698,203.21,326.524,203.394,336.186z"></path> <path class="st0" d="M141.098,205.698c-9.717-8.664-18.354-16.682-25.496-23.824c6.923,10.704,13.333,20.425,22.882,32.494 C139.323,211.511,140.198,208.624,141.098,205.698z"></path> <path class="st0" d="M194.91,251.657c-14.556-12.107-28.463-23.816-41.054-34.745c-0.893,4.133-1.785,8.371-2.64,12.729 c9.852,11.312,22.541,24.874,39.826,42.291C192.187,265.361,193.466,258.587,194.91,251.657z"></path> <path class="st0" d="M330.506,424.022c-0.372-18.197-4.4-63.248-33.957-88.205c-27.911-23.568-59.254-49.094-88.812-73.532 c-0.912,7.576-1.751,15.587-2.46,23.838c1.938,1.92,3.889,3.841,5.929,5.836c40.044,39.253,71.222,70.09,74.808,113.228 C299.34,414.654,314.525,421.052,330.506,424.022z"></path> <path class="st0" d="M143.198,285.524l41.136,34.617c0.946-9.032,2.205-19.405,3.886-30.746 c-12.943-14.635-26.625-30.327-39.594-45.689C146.277,257.298,144.327,271.497,143.198,285.524z"></path> <path class="st0" d="M134.872,227.196c-20.23-24.656-37.018-46.956-43.656-60.473l5.58-6.683c-0.011-0.008-0.022-0.023-0.022-0.023 l6.676-8.266c0,0,17.463,16.742,42.478,39.05c4.013-11.837,8.547-23.936,13.682-35.975l9.5,3.586c0,0-5.555,17.357-11.623,42.605 c12.654,11.087,26.628,23.028,40.951,34.7c2.686-11.394,5.788-23.043,9.392-34.707l9.35,2.483c0,0-3.616,16.922-7.156,41.533 c15.355,12.174,30.777,23.681,45.052,33.132c61.016,40.431,102.772,82.721,107.136,147.785c20.744,0,66.91,0,109.11,0 c56.584,0,48.096-56.58,11.315-65.064c-24.809-5.731-56.685-18.895-56.685-18.895c-12.576-4.193-22.867-13.39-28.44-25.421 c0,0-1.373-2.902-3.679-7.824l-46.202,13.975c-5.049,1.522-10.378-1.335-11.904-6.376c-1.527-5.048,1.327-10.382,6.375-11.904 l43.526-13.165c-3.744-7.966-8.087-17.237-12.662-27.018l-43.172,13.058c-5.04,1.523-10.378-1.327-11.904-6.375 c-1.526-5.049,1.331-10.374,6.376-11.904l40.531-12.257c-4.313-9.256-8.607-18.475-12.575-27.041l-40.262,12.174 c-5.044,1.53-10.377-1.327-11.904-6.376c-1.522-5.04,1.328-10.373,6.372-11.896l37.715-11.409 c-5.404-11.77-9.335-20.485-10.374-23.186c-4.546-11.806-14.511-44.533-37.254-26.328 c-37.389,29.922-105.596,21.138-123.204-11.574c-13.202-24.52-5.66-50.924,0-71.672c4.519-16.585-18.869-42.441-35.844-19.81 c-12.002,16-113.171,135.806-113.171,135.806l100.457,84.537C127.228,257.77,130.544,243.151,134.872,227.196z"></path> </g> </g></svg>
                    </span>
                </div>
                <div class="col-3">
                    <span>
                        <svg width="70" fill="#83807b" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 122.3 122.3" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M116.3,15.15H6c-3.3,0-6,2.7-6,6v80c0,3.3,2.7,6,6,6h110.3c3.3,0,6-2.7,6-6v-80C122.3,17.85,119.6,15.15,116.3,15.15z M42.6,57.75l-19.7,19.7c-1.7,1.7-4.2,2.3-6.3,1.4c-4.3-1.8-5-7-2.1-9.9l11.2-11.2c2.3-2.3,2.3-6.1,0-8.5l-11.3-11.2 c-2.9-2.9-2.2-8.1,2.1-9.9c2.2-0.9,4.7-0.3,6.3,1.4l19.7,19.7c1.2,1.2,1.8,2.7,1.8,4.2S43.8,56.55,42.6,57.75z M86.5,79.15h-36 c-3.3,0-6-2.7-6-6s2.7-6,6-6h36c3.3,0,6,2.7,6,6S89.8,79.15,86.5,79.15z"></path> </g> </g></svg>
                    </span>
                </div>
            </div>

        </div>
        <div class="about-skills  mb-5 container">
            <div class="position-relative">
                <h2 class='col-12 col-md-6 col-lg-5 mt-5 mb-5 subt'>Mis habilidades</h2>
            </div>
            <div class="margin-top-bott-elem skills-wrapper">
                <div class="d-flex flex-wrap flex-column flex-sm-row  justify-content-around skills1">
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


    </section>
    <section class='position-relative works bg-white'>

        <header class="pt-5 container  bg-white works-header">
            <h2 class='pt-md-3 ml-5  mb-5  subt'>Últimos <br> proyectos</h2>
            <!--<div class="margin-top-bott-elem d-flex  flex-column  justify-content-center align-items-center works-intro">
                                                                                    <div class='m-0 text-center'><p>Estos son los últimos  de mis proyectos desarrollados.</p></div>
                                                                                </div>-->
        </header>
        <section
            class=' pl-3 pr-3  works-contain bg-white mt-5 mb-4 pt-5 pb-2
            container col-9 col-lg-7 col-xl-5 d-flex flex-wrap   justify-content-center align-items-center'>
            @include('site.home.partials.contentWorks')
        </section>
        <div class="pt-5 pb-5 mt-5 mb-5 d-flex align-items-center justify-content-center bg-white">
            <a href="{{ route('portfolio') }}">
                <div class=" d-flex align-items-center justify-content-center">
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
    <script src="{{ asset('js/snap/snap.svg.js') }}"></script>
    <script src="{{ asset('js/anim-slide.js') }}"></script>
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
