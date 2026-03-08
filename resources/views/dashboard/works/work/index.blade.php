@extends('layouts.dashboard')
@php $pag_title = 'Proyectos'; @endphp

@section('title-doc', $pag_title)

@section('title')
    {{$pag_title}}
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{$pag_title}}</li>
@endsection


@section('content')
	@include('flash::message')
    @component('dashboard.partials.card')
        @slot('header')
        	<a href=" {{route('works.create')}} ">
                <span class="btn btn-flat btn-sm btn-success">Nuevo Proyecto</span>
            </a>
        @endslot @slot('tools','')

        @slot('body')
        <table class="table">
            <thead>
                <th>#</th>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Servicios</th>
                <th>Detalle</th>
                <th>Enlace</th>
                <th>...</th>
            </thead>
            <tbody>
                @foreach($works as $work)
                        <tr>
                        
                            <th>{{$loop->iteration}}</th>
                            <td>{{$work->title}} </td>
                            <td>
                            	@if($work->categoryWork)
                            	{{$work->categoryWork->categoryWork_name}}
                            	@else
                            	{{'S/lcategoría'}} 
                            	@endif
                            </td>
                            <td>
                            	@foreach($work->technologyTool as $techs_tool)
                            	<span class='badge badge-info'> 
                            		{!! $techs_tool->technology->technology_name.' / ' .$techs_tool->tool->tool_name  !!}
                            	</span>
                            	@endforeach
                            </td>
                            <td>{!!$work->detail!!}</td>
                            <td>
                            {{$work->url}}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class='btn pt-0 pl-1 pr-1 pb-0 btn-danger' href=" {{route('works.destroy',$work->id)}}" 
                                    onclick="return confirm('Deseas eliminar este elemento?')" >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a class='btn pt-0 pl-1 pr-1 pb-0 btn-warning' href="{{route('works.edit',$work->id)}}">
                                        
                                        <i class="fas fa-edit"></i>
                                            
                                    </a>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @endslot
        @slot('footer')
        {!! $works->render() !!}
        @endslot
        @endcomponent
    
@endsection

@section('js')
<script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>
@endsection