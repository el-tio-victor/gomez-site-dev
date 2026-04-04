@extends('layouts.dashboard')

@section('title-doc','Imágenes')

@section('title')
    Imágenes
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Imágenes</li>
@endsection

@section('content')
   <div>
     <h3 class='text-center'>Imagenes Principales</h3>
        <div class="row justify-content-around">
       
            @foreach($images as $image)
            
                @component('dashboard.partials.card', ['class_card'=>'col-md-3 ml-1 p-0'])
                    @slot('header'){{$image->title}}@endslot
                    @slot('tools','')
                    @slot('body')
        
                            <img class="card-img-top " src="/images/articles/{{$image->name}} " alt="Card image cap">
                    @endslot
                    @slot('footer','')
                    @endcomponent
            @endforeach
        </div> 
   </div>
    
   
@endsection
