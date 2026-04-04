@extends('layouts.dashboard')

@section('title-doc','Nuevo  Artículo')

@section('title')
    Nuevo Artículo
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item "><a href="dashboard.articles" class="">Artículos</a></li>
    <li class="breadcrumb-item active">Crear</li>
@endsection
@section('content')
    @include('dashboard.blog.articles._form',['route'=>'articles.store', 'article'=> null,'method' => 'POST'])
@endsection

@section('js')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({height:320})
    $('.textarea').summernote('code',"{{old('content')}}"  )
    @error('content')
        let editor = $('div.note-editor.note-frame')
        editor.css('border','solid 1px red')
        .before("@include('dashboard.partials._errors-form',['errors',$errors,'name'=>'content'])")
    @enderror
  })
</script>
@endsection
