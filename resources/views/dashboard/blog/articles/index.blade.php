@extends('layouts.dashboard')

@section('title-doc',' Artículos')

@section('title')
    Artículos
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Artículos</li>
@endsection

@section('content')

    @component('dashboard.partials.card')
        @slot('header') @endslot

        @slot('tools')
            <div class="   wrapper-search">
                {!! Form::open(['route'=>'articles.index','method'=>'GET','class'=>'']) !!}
                <div class='d-flex ' style='border:solid .1rem #e9ecef !important;'>
                   
                    <div class="input-group input-group-sm">
                        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Busqueda', "aria-describedby"=>"search"]) !!}
                        <span class="input-group-append " id="search"> 
                            <button class="btn btn-flat btn-primary" type='button'> <i class="fas fa-search"> </i></button>  
                        </span>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        @endslot

        @slot('body')
        @include('flash::message')
        <a class='btn btn-sm btn-success' href=" {{route('articles.create')}} ">
            <span class=""><i class=" pr-1 fas fa-plus-circle"> </i>Nuevo Articulo </span>
        </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Estado </th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($articles as $article)
                        <tr class=" {{ ($article->status === 'edited' )? 'callout callout-warning' : ''  }} " >
                            <th scope="row">{{$loop->iteration}}</th>
                            <td> {{$article->title}} </td>
                            <td> {{$article->category->name}} </td>
                            <td> {{($article->status === 'edited' )? 'En edición' : 'Publicado' }} </td>
                            <td> {{$article->user->name}} </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{route('dashboard.articles.destroy',$article->id )}}"
                                    onclick="return confirm('Deseas eliminar este elemento?')"  
                                        class="btn  btn-danger" title='Eliminar'>
                                        <span class="fas fa-trash"></span>
                                    </a>
                                    <a href="{{route('articles.edit',$article->id )}}"
                                        class="btn  btn-warning" title='editar'>
                                        <span class="fas fa-edit"></span>
                                    </a>
                                </div>  
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endslot

        @slot('footer')
        {!! $articles->render() !!}
        @endslot
    @endcomponent
    
@endsection

@section('js')
    <script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>
@endsection