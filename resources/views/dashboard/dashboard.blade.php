@extends('layouts.dashboard')

@section('content')
<!-- small boxes (header)
*********************************
 -->
<div class='row'>
  <!-- Small box cantidad articulos -->
  <div class='col-12 col-sm-3'>
  @component('dashboard.partials._small-box')
    @slot('color_box','bg-primary')
    @slot('icon', 'ion-ios-paper') 
    @slot('text', 'Articulos publicados')
    @slot('quantity', $totales_articulos)
  @endcomponent
  </div>

  <!-- small box  proyectos -->
  <div class='col-12 col-sm-3'>
  @component('dashboard.partials._small-box')
    @slot('color_box','bg-success')
    @slot('icon', 'ion-briefcase') 
    @slot('text', 'Proyectos agregados')
    @slot('quantity', $totales_proyectos)
  @endcomponent
  </div>

</div>

<!-- Paneles ultimos articulos y proyectos
************************************
 -->
<div class='row'>

  <!-- Panel ultimos articulos -->
  <section class='col-12'>
        @component('dashboard.partials.card',['class_card'=>'card-outline card-primary'])
            @slot('tools')@endslot
            @slot('header') 
                <h3 class='card-title'>
                    <em class='nav-icon far fa-newspaper'>&nbsp; </em>
                    Últimos articulos
                </h3> 
            @endslot
            @slot('body')
                <div class='row'>
                @foreach($articles as $article)
                  @component('dashboard.partials._card-dashboard')
                    @slot('title') {{$article->title}} @endslot 
                    @slot('category') {{$article->category_name}} @endslot
                    @slot('date') {{$article->updated_at}} @endslot 
                    @slot('content') {!! $article->summary !!} @endslot
                  @endcomponent    
                @endforeach
                </div>
            @endslot
            @slot('footer')@endslot
        @endcomponent 
  </section>

  <!-- Panel ultimos proyectos -->
  <section class='col-12'>
        @component('dashboard.partials.card',['class_card'=>'card-outline card-success'])
            @slot('tools')@endslot
            @slot('header') 
                <h3 class='card-title'>
                    <em class='nav-icon fas fa-briefcase'>&nbsp; </em>
                    Últimos proyectos 
                </h3> 
            @endslot
            @slot('body')
                <div class='row'>
                @foreach($works as $work)
                  @component('dashboard.partials._card-dashboard')
                    @slot('title') {{$work->title}} @endslot 
                    @slot('category') {{$work->categoryWork->categoryWork_name}} @endslot
                    @slot('date') {{$work->updated_at}} @endslot 
                    @slot('content') {!! $work->detail !!} @endslot
                  @endcomponent    
                @endforeach
                </div>
            @endslot
            @slot('footer')@endslot
        @endcomponent 
  </section>
</div>
@endsection
