@extends('layouts.dashboard')

@section('title-doc','Editar  Artículo')

@section('title')
    Editar artículo
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item "><a href="dashboard.articles" class="">Artículos</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection
@section('content')
    @include('dashboard.blog.articles._form',['route'=>['articles.update',$article], 'article'=> $article,'method' => 'PUT'])
@endsection




