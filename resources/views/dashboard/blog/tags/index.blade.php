@extends('layouts.dashboard')

@section('title-doc',' Categorías')

@section('title')
    Tags
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Tags</li>
@endsection


@section('content')
@include('flash::message')
<div class="row">
        <section class='col-md-6 col-lg-7 '>
            @component('dashboard.partials.card', ['class_card'=>'card-outline card-primary'])
                @slot('header','Todos los tags')
                @slot('tools')
                    {!! Form::open(['route'=>'tags.index','method'=>'GET','class'=>'']) !!}
                    <div class='d-flex ' style='border:solid .1rem #e9ecef !important;'>
                        
                        <div class="input-group input-group-sm">
                            {!! Form::text('name',null,['class'=>'col','placeholder'=>'Buscar tag', "aria-describedby"=>"search"]) !!}
                            <span class="input-group-append " id="search">
                                <button class="btn btn-flat btn-primary" type='button'> <i class="fas fa-search"> </i></button>
                            </span>
                        </div>
                    </div>
                    {!! Form::close() !!}
                @endslot
                @slot('body')
                    <a class='align-bottom btn btn-sm btn-success' href=" {{route('tags.index')}} "><span class=""><i class="mr-1 fas fa-plus"></i>Nuevo Tag</span></a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td> {{$tag->name}} </td>
                                    <td>
                                        <div class="btn-group  btn-small">
                                            <a class='btn pl-1 pr-1 pt-0 pb-0 btn-danger' 
                                            onclick="return confirm('Deseas eliminar este elemento?')" 
                                            href=" {{route('dashboard.tags.destroy',$tag->id)}} ">
                                            <span class='fas fa-trash'></span>
                                            </a>
                                            <a class='btn pl-1 pr-1 pt-0 pb-0 btn-warning' href=" {{route('tags.edit',$tag->id)}} ">
                                            <span class='fas fa-edit'></span>
                                            </a>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endslot
                @slot('footer')
                    <nav aria-label="Page navigation">
                        {!! $tags->render() !!}
                    </nav>
                @endslot
            @endcomponent
        </section>
        <section class='col-md-6 col-lg-5 '>
            <div>
                @component('dashboard.partials.card', ['class_card'=>'card-outline card-success'])
                    @slot('header','Nuevo tag')@slot('tools','')
                    @slot('body')
                        @if($tag_edit === null)
                            @include('dashboard.blog.tags._form',['route'=>'tags.store', 'method'=>'POST' ])
                        @endif
                    @endslot
                    @slot('footer','')
                @endcomponent
            </div>
            <div>
                @component('dashboard.partials.card', ['class_card'=>'card-outline card-warning'])
                    @slot('header','Editar tag')@slot('tools','')
                    @slot('body')
                        @if($tag_edit != null)
                            @include('dashboard.blog.tags._form',['route'=>['tags.update',$tag],'method'=>'PUT'])
                        @endif   
                    @endslot
                    @slot('footer','')
                @endcomponent
            </div>
        </section>
</div>
   
@endsection

@section('js')
    <script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>
@endsection