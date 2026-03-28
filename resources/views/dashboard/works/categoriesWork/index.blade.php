@extends('layouts.dashboard')

@php $pag_title = 'Categorias de Trabajo'; @endphp

@section('title-doc', $pag_title)

@section('title')
    {{$pag_title}}
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{$pag_title}}</li>
@endsection

@section('content')

@include('flash::message')
    
    @include('dashboard.works.categoriesWork.partials._catego-wrapper')
     
@endsection

@section('js')
<script src="{{asset('js/dashboard/works/catego/catego-edit.js')}}">
</script>
@endsection
