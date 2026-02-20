<div class="col-12 col-sm-6 col-lg-4 p-1 mt-2 mb-2  mr-auto ml-auto ml-sm-0 mr-sm-0  @if(($index + 1) % 2 === 0) item-up @endif ">
<article class='d-flex flex-column m-auto  p-1 border  article'>
    <header class="article-header"></header>
    <section class="article-body">
        <div class="d-flex flex-column-reverse justify-content-center align-items-center article-body-wrapper">
            <div class="p-2">
                <h3 class='mb-0 pt-2 pb-1 article-title'>{{$article_title}}</h3>
                <div class=" mt-1 mb-1 article-body-info">
                    <span class="date"> <i class="icon icon-clock"></i>     {{$date}}</span><span class=" ml-1 badge badge-pill bg-naranja article-category">{{$category}}</span>
                </div>
                <div class="col article-body-text">
                    <p>{!!$summary!!}</p>
                </div>
                
            </div>
            <div class='col-12 d-flex align-items-center p-0 m-0'>
                <a href="{{route('blog.article',$article_slug)}}">
                    <img class='rounded article-img' src="{{asset('images/articles/'.$image_name)}}"
                        alt="{{$article_title.' blog gomez-ste'}}" class='card-img-top' >
                </a>
            </div>
        </div>
    </section>
    <footer class="p-1 article-footer">
        <a href="{{route('blog.article',$article_slug)}}">
            <span class='article-more-link'>
                Seguir leyendo...
                <i class="transition icon-arrow-right2"> </i>
            </span>
        </a>
    </footer>
</article>
</div>
