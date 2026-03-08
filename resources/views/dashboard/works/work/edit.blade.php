@extends('layouts.dashboard')
@php $pag_title = 'Editar trabajo'; @endphp

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
	</style>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item "><a href="/dashboard/works"> Proyectos </a></li>
    <li class="breadcrumb-item active">{{$work->title}}</li>
    
@endsection

@section('content')
 {!!Form::open(['route'=>['works.update',$work],'method'=>'PUT'])!!}
	@component('dashboard.partials.card')
		
		@slot('header') 
			<div class="form-group d-flex ">
                {!!Form::label('title','Titulo',['class'=>' col'])!!}
                <div class="col-11">
                    {!!Form::text('title',$work->title,['
                        placeholder'=>'Titulo de Trabajo',
                        'class'=>'form-control'])!!}
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
            
        	<div class="form-group">
           		{!!Form::label('categoryWork_name','Categoría',['class'=>' col'])!!}
           		<div class="select2-purple col-8">
           			{!! Form::select('id_categoryWork',$categoryWork,$work->id_categoryWork,['class'=>'select2 form-control ']) !!}
           		</div>
            	 
            </div>
            	
            <div class="form-group">
           		{!!Form::label('techs','Tecnologías y Herramientas',['class'=>' col'])!!}
           		<div class="select2-purple col-8">
           			{!! Form::select('techs[]',[],[],['class'=>'select2 form-control techs','multiple']) !!}
           		</div>
            	 
            </div>	
            <div class="form-group d-flex flex-column">
                {!!Form::label('detail','Descripción',['class'=>' col'])!!}
                <div class="col-12">
                    {!!Form::textarea('detail',$det = old('detail') ? old('detail'): $work->detail ,['
                        placeholder'=>'descripción del trabajo del trabajo',
                        'class'=>'form-control textarea'])!!}
                    @if ($errors->has('detail'))
                        <span class="help-block">
                            {{ $errors->first('detail') }}
                        </span>
                    @endif
                </div>
                
            </div>
            <div class="form-group d-flex flex-column">
                {!!Form::label('url','Url',['class'=>'col'])!!}
                <div class="col-8">
                    {!!Form::text('url',$work->url ,['
                        placeholder'=>'URL no obligatorio',
                        'class'=>'form-control'])!!}
                    @if ($errors->has('detail'))
                        <span class="help-block">
                            {{ $errors->first('detail') }}
                        </span>
                    @endif
                </div>
                
            </div>
        @endslot
        
        @slot('footer')
        	{!! Form::submit('Crear',['class'=>'btn btn-success']) !!}
        @endslot
	@endcomponent
 {!!Form::close()!!}
   
     
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script>
		$('document').ready(function(){
            $('.textarea').summernote({height:320})
            
            $('.textarea').summernote('code', '{!!$work->detail!!}' )
			//Cuando la pag esta lista hago una consulta ajax para saber la lista de tech
			$.ajax({
				url: '/dashboard/techtool/list',
				dataType: 'json',
				delay: 250,
				data: { 'id_work': {{$id_work}} },
				success:function(data){
					//si la petición fue exitosa le cargo al select2 de las tech el resultado
					$('.techs').select2({
        				placeholder:'Selecciona',
            				data: data
        			})
				
				}
			})
		})

	</script>
@endsection