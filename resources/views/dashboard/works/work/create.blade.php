@extends('layouts.dashboard')

@php $pag_title = 'Nuevo Proyecto'; @endphp

@section('title-doc', $pag_title)

@section('title')
    {{$pag_title}}
@endsection

@section('css')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<style>
	   .select2-search__field:focus{
	       border:none!important;
       }
       .select2-container--default .select2-selection--single {
           padding: inherit;
       }
	</style>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item "><a href="/dashboard/works"> Proyectos </a></li>
    <li class="breadcrumb-item active">Nuevo Proyecto</li>
    
@endsection

@section('content')
{!!Form::open(['route'=>'works.store','method'=>'post','files'=>true])!!}
	@component('dashboard.partials.card')
		
		@slot('header') 
			<div class="form-group d-flex">
                {!!Form::label('title','Titulo',['class'=>'text-right col'])!!}
                <div class="col-11">
                    {!!Form::text('title',old('title'),['
                        placeholder'=>'Titulo de Trabajo',
                        'class'=>'form-control','required'=>'required'])!!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            {{ $errors->first('title') }}
                        </span>
                    @endif
                </div>
            </div>
		@endslot

        @slot('tools')
            
        @endslot

        @slot('body')
         
         	<div class="form-group d-flex">
                
                {!!Form::label('categoryWork_name','Categoría',['class'=>' col'])!!}
           		<div class="select2-purple col-8">
           			{!! Form::select('id_categoryWork',$categoryWork,old('id_categoryWork'),['class'=>'select2 form-control categoryWork','required'=>'required']) !!}
           		</div>
               
            </div>
        	 <div class="form-group d-flex">
                
                {!!Form::label('techs','Tecnologías y Herramientas',['class'=>' col'])!!}
           		<div class="select2-purple col-8">
           			{!! Form::select('techs[]',[],old('techs'),['class'=>'select2 form-control techs','multiple','required'=>'required']) !!}
           		</div>
               
            </div>
            <div class="form-group d-flex flex-column">
                {!!Form::label('detail','Descripción',['class'=>' col'])!!}
                <div class="col-12">
                    {!!Form::textarea('detail',old('detail'),['
                        placeholder'=>'descripción del trabajo del trabajo',
                        'class'=>'form-control textarea','required'=>'required'])!!}
                    @if ($errors->has('detail'))
                        <span class="help-block">
                            {{ $errors->first('detail') }}
                        </span>
                    @endif
                </div>
                
            </div>
            <div class="form-group d-flex">
                {!!Form::label('url','Url',['class'=>' col'])!!}
                <div class="col-8">
                    {!!Form::text('url',null,['
                        placeholder'=>'Url opcional',
                        'class'=>'form-control'])!!}
                    @if ($errors->has('detail'))
                        <span class="help-block">
                            {{ $errors->first('detail') }}
                        </span>
                    @endif
                </div>
                
            </div>
            <div class='form-group border'>
            	{!! Form::label('','Imágenes',['class'=>'text-left col']) !!}
            	 <div class=" d-flex justify-content-around  form-group">
                    <div>
                    	{!! Form::label('img','Principal',['class'=>'text-left col']) !!}
                        <div class="col-8">
                            {!!  Form::file('img') !!}
                            @if ($errors->has('img'))
                                <span class="help-block">
                                    {{ $errors->first('img') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div>
                    	{!! Form::label('img','Grales.',['class'=>'text-left col']) !!}
                        <div class="col-8">
                            {!!  Form::file('imgs[]',['multiple']) !!}
                            @if ($errors->has('img'))
                                <span class="help-block">
                                    {{ $errors->first('img') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    
                </div>
            </div>
           
        @endslot
        
        @slot('footer')
        	<div class="col border-top text-center p-1  footer-form">
                {!! Form::submit('Crear',['class'=>'btn btn-success']) !!}
            </div> 
        @endslot
        
    @endcomponent
{!!Form::close()!!}
  
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script>
		$(document).ready(function(){
            $('.textarea').summernote({height:320})
			$('.techs').select2({
				placeholder:'Selecciona',
				ajax: {
					url: '/dashboard/techtool/list',
					dataType: 'json',
					delay: 250,
					// Additional AJAX parameters go here; see the end of this chapter for the full code of this example
					/*processResults: function (data) {
			            return {
			              results: data
			            };
			          },*/
				}
			})

			$('.categoryWork').select2()
		})
	</script>
@endsection