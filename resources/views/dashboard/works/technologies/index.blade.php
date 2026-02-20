@extends('layouts.dashboard')
@php $pag_title = 'Tecnologías y Herramientas'; @endphp

@section('title-doc', $pag_title)

@section('title')
    {{$pag_title}}
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{$pag_title}}</li>
@endsection

@section('content')
	@include('flash::message')
	
    
    @include('dashboard.works.technologies.partials._tech-wrapper')

@endsection

@section('js')
<script src="{{asset('js/dashboard/works/techs/tech-edit.js')}}">
</script>
@endsection

