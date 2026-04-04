@extends('layouts.dashboard')

@section('title-doc',' Categorías')

@section('title')
    Categorías
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Categorías</li>
@endsection


@section('content')
@include('flash::message')
    <div class="row">
        <section class='col-md-6 col-lg-7 '>
            @component('dashboard.partials.card', ['class_card'=>'card-outline card-primary'])
                @slot('header','Todas las categorias')@slot('tools','')
                @slot('body')
                    <a href=" {{route('categories.index')}} " class='btn btn-sm btn-success'><i class="fas fa-plus pr-1"></i> Agregar Categoria</a>
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>             
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$category->name}}</td> 
                                        <td>
                                            <div class="btn-group btn-sm">
                                                <a class='pl-1 pr-1 pt-0 pb-0 btn btn-danger' role='button'
                                                    onclick="return confirm('Deseas eliminar este elemento?')" 
                                                 href=" {{route('dashboard.categories.destroy',$category->id)}} "> 
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a class=' pl-1 pr-1 pt-0 pb-0 btn btn-warning' href=" {{route('categories.edit',$category->id)}} ">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div-btn-group>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                           
                        </nav>
                        
                    
                @endslot
                @slot('footer')
                {!! $categories->render() !!}
                @endslot
            @endcomponent
        </section>
        <section class='col-md-6 col-lg-5 '>
            <div>
                @component('dashboard.partials.card', ['class_card'=>'card-outline card-success'])
                    @slot('header','Nueva Categoría')@slot('tools','')
                    @slot('body')
                        @if($category_edit === null)
                            @include('dashboard.blog.categories._form',['route'=>'categories.store','method'=>'POST'])
                        @endif
                    @endslot
                    @slot('footer','')
                @endcomponent
            </div>
            <div>
                @component('dashboard.partials.card', ['class_card'=>'card-outline card-warning'])
                    @slot('header','Editar categoría')@slot('tools','')
                    @slot('body')
                        @if($category_edit != null)
                            @include('dashboard.blog.categories._form',['route'=>['categories.update',$category],'method'=>'PUT'])
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