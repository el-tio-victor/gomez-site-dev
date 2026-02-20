@extends('template.main')

@section('head-title')
 Blog
@endsection

@section('css')
	<link rel="stylesheet" href=" {{asset('css/style-home-blog.css')}} ">
@endsection

@section('content-meta-name-description')
    content="Blog de sitio Gomez-Site sobre desarrollo web y  diversos temas que no necesariamente son sobre 
    informatica" 
@endsection

@section('header')
    @component('home.partials.header')
	<div class=" d-flex flex-column justify-content-center align-items-center">
		<div>	
			<h1>Articulos</h1>
		</div>
		<div>
			@if($filter->all()['filter'] == 'all')
           			<span class='f1 c-o p-1  bg-w'><i class='icon-filter '></i> Todos</span>
        		@elseif($filter->all()['filter'] == 'category')
            			<span class='border h1-filter '>
					<span class='f1  bg-w c-o'> 
						<i class='icon-books p-1'></i>Categoria
					</span>
					<span> {{$filter->all()['category_name']}}</span>
				</span>
		        @elseif( $filter->all()['filter'] == 'tag' )
            			<span class='border h1-filter '>
					<span class='f1  bg-w c-o'> 
						<i class='icon-price-tag p-1'></i>Tag
					</span>
					<span> {{$filter->all()['tag_name']}}</span>
				</span>
       			@endif 
		</div>
	</div>
    @endcomponent
@endsection

@section('content')
    @component('home.blog.components.simple-panel')
	@slot('filter',$filter)
        @slot('article')
                @foreach($articles as $article)
                    <article class="col-10 col-sm-6    article">
                        <div class='card   card-image-cont'>
                            @foreach($article->images as $image)
                                <a href="{{route('blog.article',$article->slug)}}">
                                    <img src="{{asset('images/articles/'.$image->name)}}"
                                    alt="{{$article->title.' blog gomez-ste'}}" class='card-img-top'
                                    >
                                </a>
				<script async defer data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>
                            @endforeach
                        </div>
                            
                        
                        <div class="article-ribbon">
                             <a href="">
                                <span class="badge badge-category">
                                    <i class="icon-books f-75"></i>
                                    {{$article->category->name}}
                                </span>
                            </a>
                        </div>
                        <h3> {{$article->title}} </h3>
                        <span>
                            <i class="icon-clock"></i>&nbsp;{{$article->updated_at->diffForHumans()}}
                        </span>
                        <div class="article-text">
                            <p> {!!$article->summary!!} </p>
                        </div>
                        <a href="{{route('blog.article',$article->slug)}}">
                            <span class='article-more-link'>
                                Ver Mas
                                <i class="transition icon-arrow-right2"> </i>
                            </span>
                        </a>
                        <footer class="row  ">        
                            <span class="d-flex align-items-center badge badge-light ">
                            
                            </span>
                        </footer>
                    </article>
                     
                @endforeach
                
        @endslot
        @slot('paginate')
            <nav aria-label="navigation border border-success ">
                    {{ $articles->links() }}
            </nav>
        @endslot
	  @slot('aside')
            <strong class=' m-1 color-black   fb_p'><i class='f1-5 icon-facebook2'></i> Síguenos en facebook</strong>
            <div class='text-center fb_container'>
                
               <div class="fb-page m-auto" data-href="https://www.facebook.com/GomezSite/" data-tabs="" data-small-header="false"                   data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
			<blockquote cite="https://www.facebook.com/GomezSite/" class="fb-xfbml-parse-ignore">
		<a  ' href="https://www.facebook.com/GomezSite/"><span id='fb_a'>Gomez-Site</span></a></blockquote>
	       </div> 
            </div>
        @endslot
    @endcomponent
@endsection

@section('js')
    <script src=" {{asset('js/scenesHeaderScrollMagic.js')}} "></script>
    <script src=" {{ asset('js/scenesAsideBlogScrollMagic.js') }}   ">
    </script>
  <div id="fb-root"></div>
    <script>(function(d, s, id) {

	if($(window).innerWidth() > 768){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
      fjs.parentNode.insertBefore(js, fjs);
	}
	else{
		$('#fb_a').html("<a href='https://www.facebook.com/GomezSite/' target='_blanck'> <i class='icon-facebook'></i>facebook.com/GomezSite/</a>" )
	}
    }(document, 'script', 'facebook-jssdk'));</script>
 
@endsection

@section('footer')
    @include('template.partials.footer')
@endsection
