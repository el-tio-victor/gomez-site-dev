{{--
    //@var string         $route recibe la ruta para el action del form
   // @var object/array   $article variable del modelo article
   @var string            $method metodo por el que se va enviar el form

--}}

@php
if( $article === null ){
    $title          = old('title');
    $category_id    = old('category_id');
    $status         = old('status');
    $content        = old('content');
    $tags_u           = old('tags');
}
else{
    
    $title          = (old('title') != '')  ? old('title') : $article->title;
    $category_id    = (old('category_id') != '') ? old('category_id') : $article->category->id;
    $status         = (old('status') != '') ? old('status') : $article->status;
    $content        = (old('content') != '') ? old('content') : $article->content;
    $tags_u           = (old('tags') != '') ? old('tags') : $article_tags;
}

//variable para el estatus del post
$st_edited      = ( $status === 'edited' || $status === null )?true: false;
$st_publishes   = ( $status === 'published' )?true: false;
@endphp

{!! Form::open( ['route'=>$route ,'method'=> $method,'files'=>true] ) !!}
    @component('dashboard.partials.card')
        @slot('header')
                <div class="col mb-0 d-flex form-group">
                    {!!  Form::label('title','Titulo',['class'=>'col text-right']) !!}
                    <div class="col-8">
                        {!! Form::text("title",$title,['class'=>"form-control ".MyHelpers::invalidInput($errors->get('title')),'required'=>'required' ]) !!}
                        @include('dashboard.partials._errors-form',['errors',$errors,'name'=>'title'])
                    </div>
                </div>
        @endslot
        @slot('tools')    
        @slot('body')
                <div class="col mt-4 d-flex form-group">
                    {!!  Form::label('category_id','Categoria',['class'=>'col text-right']) !!}
                    <div class="col-6">
                        {!!  Form::select('category_id',$categories, $category_id,[
                        'class'=>'form-control '.MyHelpers::invalidInput($errors->get('category_id')),
                        'required',
                        'placeholder'=>'Seleccione ...']) !!}
                    </div>
                    
                </div>
                <div class="col  d-flex form-group">
                    {!! Form::label('status','Estado de articulo',['class'=>'col text-right']) !!}
                    
                    <div class='d-flex pl-2 col-6'>
                        <div class="custom-control custom-radio">
                        {!!  Form::radio('status','edited',$st_edited,['id'=>'r1','class'=>'custom-control-input']) !!}
                        {!! Form::label('r1','En ediciÃ³n',['class'=>'custom-control-label']) !!}
                        
                        </div>
                        <div class="custom-control custom-radio ml-2">
                        {!!  Form::radio('status','published',$st_publishes,['id'=>'r2','class'=>'custom-control-input']) !!}
                        {!! Form::label('r2','Publicado',['class'=>'custom-control-label']) !!}
                        </div>
                    </div>
                   
                </div>  
                <div  class="    form-group">
                    {!! Form::label('content','Contenido',['class'=>'col text-left']) !!}
                    <div class="col-12">
                        <div id='content' class=''>
                            {!!Form::textarea('content',$content ,['
                            placeholder'=>'descripci¨®n del trabajo del trabajo',
                            'class'=>'form-control textarea'])!!}
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="col col-md-6  d-flex  form-group">
                        {!! Form::label('tags','Tags') !!}
                        <div class="col-8">
                            {!! Form::select('tags[]',$tags,$tags_u,['class'=>'form-control','multiple']) !!}
                        </div> 
                    </div>
                    @if( $article === null )
                    <div class="col col-md-6    d-flex form-group">
                        {!! Form::label('image','Imagen') !!}
                        <div class="col-8">
                            {!!  Form::file('image',['class'=>'btn btn-info']) !!}
                        </div>
                    </div>
                    @endif
                </div>
                
   
        @endslot
        @slot('footer') 
            <div class="col-xs-12  text-center">
                    {!! Form::submit('Crear',['class'=>'btn btn-success']) !!}
            </div>
        @endslot       
    @endcomponent
{!! Form::close() !!}

@section('js')
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({height:320})
    //$('.textarea').summernote('code', )
    @error('content')
        let editor = $('div.note-editor.note-frame')
        editor.css('border','solid 1px red')
        .before("@include('dashboard.partials._errors-form',['errors',$errors,'name'=>'content'])")
    @enderror
  })
</script>
@endsection