@extends('dashboard.template.main')

@section('title')
    <h2>Modificar Categoria {{$category->name}}</h2>
@endsection

@section('content')
    {!! Form::open( ['route'=>['categories.update',$category],'method'=>'PUT'] ) !!}
    <div class="col-6 row form-group">
        {!! Form::label('name','Nombre',['class'=>'col text-right']) !!}
        <div class="col-8">
            {!! Form::text('name',$category->name,['class'=>'form-control', 'placeholder'=>'Nombre de Categoria', 'required'])
             !!} 
             @if( count($errors->get('name'))> 0 )
                <span class="msg alert-danger">
                        @foreach ($errors->get('name') as $message) 
                        {{ $message }} 
                        @endforeach
                    </span>
             @endif
        </div>
    </div>
    <div class="col-6 form-group text-center">
        {!! Form::submit('Enviar',['class'=>'btn btn-success'])!!}
    </div>
    {!! Form::close() !!}
@endsection