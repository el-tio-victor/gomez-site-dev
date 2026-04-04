@extends('layouts.dashboard')

@section('title-doc','Imágenes')

@section('title')
    Imágenes
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Imágenes generales</li>
@endsection

@section('content')
  <section class="d-flex">
    <div class="info-box">
    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
    <div class="info-box-content">
      <span>Sube tú imágen</span>
      {!!Form::open(['route'=>'images.store','method'=>'POST','files'=>'true'])!!}
          {!! Form::file('image')!!}
          {!!Form::submit('Subir')!!}
      {!!Form::close()!!}
    </div>
    </div>
  </section>

    
  @component('dashboard.partials.card', ['class_card'=>'card-outline card-primary'])
      @slot('header','Todas las categorias')@slot('tools','')
      @slot('body')
          @if($imgs['status'])
              @foreach( $imgs['imgs'] as $img )
                <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="/images/articles/generals/{{$img}}" alt="">
                      <div class="card-body">
                        <h5 class="card-title">Enlace</h5>
                        <small class="card-text">/images/articles/generals/{{$img}}</small>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                </div>
                  <img src="" alt="">
              @endforeach
          @else
            <p>No  se han cargado imágenes aun</p>
          @endif
      @endslot
      @slot('footer','')
  @endcomponent
  
@endsection
