@extends('layouts.site')

@section('css')

<link rel="stylesheet" href="{{asset(MyHelpers::versionAuto('/css/portfolio-work.css'))}}">
@endsection

@section('title',$work->title)

@php
$categoryWork = $work->categoryWork->categoryWork_name;
@endphp

@section('header')
@php
$img_src = $work_image_main->name;
$video_class = (MyHelpers::typeFile( $img_src ) === 'video') ? 'header-main-wrapper-video' : '';
@endphp
@component('site.partials._header',['class_flex_childs' => 'flex-column justify-content-center pt-3 align-items-center','class_header_video'=>$video_class])
@if( MyHelpers::typeFile( $img_src ) === 'image' )
<img src="{{asset('images/works/'.$img_src)}}" alt="" class="img-fluid work_image_main" />
@elseif( MyHelpers::typeFile( $img_src ) ==='video' )
@component('site.portfolio.partials._work-video', ['class' => ' work_video_main'])
@slot('src',$img_src )
@endcomponent
@endif
<div class='  d-flex justify-content-center align-items-center header-itro'>
  <!-- <h1 class='pl-2 pr-2'>{{$work->title}}</h1> -->
</div>

<div class="pb-2 work-title">
<h1 class='d-flex align-items-center pl-2 pr-2 title'>
  <span class="mr-2 icon-cursor"></span>
  {{$work->title}}
</h1>
<span class="badge bg-secondary badge-category">{{ $categoryWork }}</span>
</div>
@endcomponent
@endsection

@section('content')
<section class=" work-info">
  <div class=' col-12 col-lg-10 p-0  m-auto d-flex flex-column flex-md-row justify-content-around align-items-start work-info-wrapper'>

    @component('site.portfolio.partials._work_techs',['work_techs' => $work_techs])
    @endcomponent
    <div class="col-12  col-md-6 pt-3 work-detail ">
      <h3>
        <span class="">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
            <path d="M352 32l-160 160h-96l-96 128c0 0 101.708-28.326 161.033-15.042l-161.033 207.042 210.951-164.072c29.419 67.327-18.951 164.072-18.951 164.072l128-96v-96l160-160 32-160-160 32z"></path>
          </svg>
        </span>
        <span> El reto</span>
      </h3>
      <div class='d-flex justify-content-start'>
        <div class="m-auto col-10 col-sm-11">
          {!! $work->detail !!}

          @if($work->url != '' && $categoryWork != 'PEN')
          <div class='mt-5 d-flex justify-content-center'>
            <a href='{{$work->url}}' target='_blank'>
              @component('dashboard.partials._btn-flat')
              @slot('text_link','Ver en vivo')
              @endcomponent
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@if( count($work_images) > 0 && $categoryWork != 'PEN' )
<section class=" container-fluid grid-gallery">
  @foreach( $work_images as $img)
  <a class='grid-gallery__item' href="">
    <img class='grid-gallery__image' src="{{asset('images/works/'.$img->name)}}" alt="" />
  </a>

  @endforeach
</section>
@elseif( $categoryWork === 'PEN')
<section class='mb-5 pt-4 pb-5 mt-5 ml-auto text-center mr-auto container-fluid'>
  <a class="d-flex justify-content-center align-items-center link" href="{!! $work->url !!}" target="_blank">
    VER EN VIVO &nbsp;
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
      <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
    </svg>
  </a>
</section>
@endif
<div class="mt-5 pt-2 mb-5 d-flex align-items-center justify-content-center">
  <a href="{{route('portfolio')}}">
    @component('dashboard.partials._btn-flat')
    @slot('text_link','REGRESAR A PORTAFOLIO')
    @endcomponent
  </a>
</div>
@endsection

@section('footer')
@include('site.partials._footer')
@endsection

@section('js')
<script>
  var slash_top, slash_bottom, slash_middle, btn_menu, nav_main
  window.onload = function() {
    btn_menu = document.querySelector('.btn-menu')
    slash_top = btn_menu.querySelector('.slash-top')
    slash_bottom = btn_menu.querySelector('.slash-bottom')
    slash_middle = btn_menu.querySelector('.slash-middle')
    btn_menu.addEventListener('click', showMenu)
    nav_main = document.querySelector('.navbar-main')
    document.querySelector('.contain-page').style.opacity = 1
    document.querySelector('.preloader').classList += ' preloader-inactive'

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