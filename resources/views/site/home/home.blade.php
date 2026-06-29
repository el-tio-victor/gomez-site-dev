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
            <div class="border d-flex align-items-center text-center">
                <div class="col-3">
                    <span>
                        <svg width="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.1945 6H14.25V7.5H15.8055L16.0362 10.5H13.5H12.9343H9V9.75H9.75V8.25H6V9.75H7.5V11.145L7.0383 12.7609C6.94315 12.7537 6.847 12.75 6.75 12.75C4.67893 12.75 3 14.4289 3 16.5C3 18.5711 4.67893 20.25 6.75 20.25C8.56422 20.25 10.0775 18.9617 10.425 17.25H12.5657L14.0657 12H16.1516L16.2203 12.8931C14.6499 13.3406 13.5 14.786 13.5 16.5C13.5 18.5711 15.1789 20.25 17.25 20.25C19.3211 20.25 21 18.5711 21 16.5C21 14.5867 19.5671 13.0081 17.716 12.7787L17.1945 6ZM6.61165 14.2542L6.02886 16.294L7.47114 16.706L8.05397 14.6662C8.62657 15.074 9 15.7434 9 16.5C9 17.7426 7.99264 18.75 6.75 18.75C5.50736 18.75 4.5 17.7426 4.5 16.5C4.5 15.3038 5.43344 14.3257 6.61165 14.2542ZM8.48075 13.1724L8.81573 12H12.5057L11.4343 15.75H10.425C10.1971 14.6273 9.46767 13.6868 8.48075 13.1724ZM16.3395 14.4419L16.5022 16.5575L17.9978 16.4425L17.835 14.3268C18.794 14.5843 19.5 15.4597 19.5 16.5C19.5 17.7426 18.4926 18.75 17.25 18.75C16.0074 18.75 15 17.7426 15 16.5C15 15.5814 15.5504 14.7914 16.3395 14.4419Z"
                                    fill="#080341"></path>
                            </g>
                        </svg>
                    </span>
                </div>
                <div class="col-6">
                    <span>
                        <svg width="60" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="#000000"
                                    d="M18.184 20.438V85.28c59.784 30.143 127.947 55.057 210.533 74.077-31.71-36.525-60.99-68.18-89.227-96.8 6.367 12.655 11.006 27.283 14.395 44.904-53.547-19.78-84.892-48.78-116.98-87.022h-18.72zm267.673.246c-22.315 31.524-48.202 61.03-75.712 89.248 16.454 18.16 33.494 37.59 51.363 58.64l17.558 20.682-26.57-5.484c-33.474-6.91-64.738-14.737-94.137-23.436-26.238 24.524-52.843 48.348-78.362 71.99l.34-.045c2.687 19.993 14 43.568 30.77 62.896 16.767 19.328 38.787 34.328 62.01 39.037l5.933 1.203 1.327 5.908c8.72 38.83 40.225 72.713 81.742 93.37 38.61 19.21 85.43 26.714 128.683 16.986-2.273-10.32-7.216-20.79-14.424-29.133-31.11-33.678-56.284-72.403-74.218-113.858-28.463-2.496-46.867 8.613-71.127 25.195l-10.545-15.43c22.512-15.387 44.72-28.565 74.05-28.744-2.307-6.2-4.458-12.45-6.44-18.745-26.75-9.675-47.364-3.717-75.018 5.998l-6.195-17.63c18.554-6.52 36.657-11.973 55.955-11.724 7.425.095 15.028 1.043 22.9 3.09 2.322-3.465 4.734-6.903 7.23-10.31-18.026-14.307-38.087-17.633-58.665-18.124l.445-18.682c22.394.535 47.575 4.742 69.678 22.074 8.265-10.045 17.24-19.77 26.74-29.13-15.804-17.233-31.818-36.77-48.746-59.553l-14.615-19.67 24 4.945c37.017 7.626 69.67 15.866 99.21 24.832 33.186-23.086 68.577-41.592 101.955-53.67V20.684H285.857zm27.303 125.37c10.444 13.26 20.557 25.25 30.55 36.257l-.224-.128 93.29 121.527-12.57-50.4c20.554 14.263 42.67 27.353 67.788 41.01v-43.08c-40.85-13.435-65.915-26.845-98.795-65.527 22.163-.41 41.016.42 57.75 2.324-38.986-15.8-83.21-29.64-137.79-41.984zM64.22 247.043c-8.06 7.607-15.976 15.208-23.695 22.82 8.767 29.856 31.006 68.292 66.934 88.683l32.05-16.92c-16.164-8.44-30.58-20.443-42.518-34.203-15.8-18.212-27.433-39.442-32.77-60.38zm75.462 94.675l3.107 10.934c16.594 58.413 65.493 102.965 124.8 125.227 33.94 12.74 71.068 18.028 107.03 14.583 10.16-2.584 15.664-11.107 17.17-21.865-47.083 9.794-96.675 1.386-137.995-19.172-43.536-21.66-78.302-57.094-90.18-100.385-8.315-2.186-16.317-5.36-23.933-9.32z">
                                </path>
                            </g>
                        </svg>
                    </span>
                </div>
                <div class="col-3">
                    <svg width="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M13 2.5V5C13 7.35702 13 8.53553 13.7322 9.26777C14.4645 10 15.643 10 18 10H22"
                                stroke="#1C274C" stroke-width="1.5"></path>
                            <path d="M7 14L6 15L7 16M11.5 16L12.5 17L11.5 18M10 14L8.5 18" stroke="#1C274C"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M2.75 10C2.75 9.58579 2.41421 9.25 2 9.25C1.58579 9.25 1.25 9.58579 1.25 10H2.75ZM21.25 14C21.25 14.4142 21.5858 14.75 22 14.75C22.4142 14.75 22.75 14.4142 22.75 14H21.25ZM15.3929 4.05365L14.8912 4.61112L15.3929 4.05365ZM19.3517 7.61654L18.85 8.17402L19.3517 7.61654ZM21.654 10.1541L20.9689 10.4592V10.4592L21.654 10.1541ZM3.17157 20.8284L3.7019 20.2981H3.7019L3.17157 20.8284ZM20.8284 20.8284L20.2981 20.2981L20.2981 20.2981L20.8284 20.8284ZM1.35509 5.92658C1.31455 6.33881 1.61585 6.70585 2.02807 6.7464C2.4403 6.78695 2.80734 6.48564 2.84789 6.07342L1.35509 5.92658ZM22.6449 18.0734C22.6855 17.6612 22.3841 17.2941 21.9719 17.2536C21.5597 17.2131 21.1927 17.5144 21.1521 17.9266L22.6449 18.0734ZM14 21.25H10V22.75H14V21.25ZM2.75 14V10H1.25V14H2.75ZM21.25 13.5629V14H22.75V13.5629H21.25ZM14.8912 4.61112L18.85 8.17402L19.8534 7.05907L15.8947 3.49618L14.8912 4.61112ZM22.75 13.5629C22.75 11.8745 22.7651 10.8055 22.3391 9.84897L20.9689 10.4592C21.2349 11.0565 21.25 11.742 21.25 13.5629H22.75ZM18.85 8.17402C20.2034 9.3921 20.7029 9.86199 20.9689 10.4592L22.3391 9.84897C21.9131 8.89241 21.1084 8.18853 19.8534 7.05907L18.85 8.17402ZM10.0298 2.75C11.6116 2.75 12.2085 2.76158 12.7405 2.96573L13.2779 1.5653C12.4261 1.23842 11.498 1.25 10.0298 1.25V2.75ZM15.8947 3.49618C14.8087 2.51878 14.1297 1.89214 13.2779 1.5653L12.7405 2.96573C13.2727 3.16993 13.7215 3.55836 14.8912 4.61112L15.8947 3.49618ZM10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981L2.64124 21.3588C3.38961 22.1071 4.33855 22.4392 5.51098 22.5969C6.66182 22.7516 8.13558 22.75 10 22.75V21.25ZM1.25 14C1.25 15.8644 1.24841 17.3382 1.40313 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588L3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14H1.25ZM14 22.75C15.8644 22.75 17.3382 22.7516 18.489 22.5969C19.6614 22.4392 20.6104 22.1071 21.3588 21.3588L20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25V22.75ZM10.0298 1.25C8.15538 1.25 6.67442 1.24842 5.51887 1.40307C4.34232 1.56054 3.39019 1.8923 2.64124 2.64124L3.7019 3.7019C4.12453 3.27928 4.70596 3.02525 5.71785 2.88982C6.75075 2.75158 8.11311 2.75 10.0298 2.75V1.25ZM2.84789 6.07342C2.96931 4.83905 3.23045 4.17335 3.7019 3.7019L2.64124 2.64124C1.80633 3.47616 1.48944 4.56072 1.35509 5.92658L2.84789 6.07342ZM21.1521 17.9266C21.0307 19.1609 20.7695 19.8266 20.2981 20.2981L21.3588 21.3588C22.1937 20.5238 22.5106 19.4393 22.6449 18.0734L21.1521 17.9266Z"
                                fill="#1C274C"></path>
                        </g>
                    </svg>
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
