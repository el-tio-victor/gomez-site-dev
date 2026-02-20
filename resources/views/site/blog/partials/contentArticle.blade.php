
@extends('template.main')

@section('header')
    @component('home.partials.header')
        <h1>{{$article->title}}</h1>
    @endcomponent
@endsection

@section('css')
   <link rel="stylesheet" href=" {{asset('css/style-home-blog.css')}} ">
   <link rel='stylesheet' href="{{ asset('css/prism.css') }}">
@endsection

@section('head-title')
    {{$article->title}}
@endsection

@section('content-meta-name-description')
    content="  {{$article->title}} "
@endsection

@section('content')
   <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script> 
    @component('home.blog.components.simple-panel')
	@slot('filter', null)
        @slot('article')
            <article class="col-lg-12  mb-4 article">
                <h3>{{$article->title}}</h3>
                <span class="badge m-1 m-md-3 badge-category">
                    <i class="icon-books"></i>
                    {{$article->category->name}}
                </span>
                <div class="col m-auto text-center  ">
                    @foreach($article->images as $image)
                        
                            <img src="{{asset('images/articles/'.$image->name)}}"
                            alt="{{$article->title.' blog gomez-ste'}}" class='img-fluid'
                            >
                 	<script async defer data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>	       
                    @endforeach               
                </div>
                <div class="content">
                    <p>{!!$article->content!!}</p>
                </div>
                <footer>
                    @foreach($article->tags as $tag)
                        <span class="badge badge-secondary">
                            <i class="icon-price-tag"></i>
                            {{$tag->name}}
                        </span>
                    @endforeach
                </footer>
            </article>
        @endslot

        @slot('paginate')
            <nav aria-label="navigation border border-success ">
                <ul class='pagination'>
                    <li>
                        <a class="article-more-link " href=" {{route('blog')}} ">
                            <i class="icon-arrow-left2 transition"> </i>Regresar a Posts
                        </a>
                    </li>
                </ul>
            </nav>
        @endslot
   	@slot('aside')
		<div><strong class='color-black'><i class='icon-share f1-5'></i>Comparte este contenido</strong></div>
            	<div class=" fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="large" 
		data-mobile-iframe="true">
			<a target="_blank"
				 href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F				plugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
				Compartir Articulo
			</a>
		</div>
        @endslot 
    @endcomponent
@endsection


@section('js')

    <script src=" {{asset('js/prism.js')}} "></script>
    <script src=" {{asset('js/scenesHeaderScrollMagic.js')}} "></script>
    <script src=" {{ asset('js/scenesAsideBlogScrollMagic.js') }}   ">
    </script>

@endsection
@section('footer')
    @include('template.partials.footer')
@endsection
