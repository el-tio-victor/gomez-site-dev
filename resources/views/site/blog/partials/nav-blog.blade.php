<nav class="d-flex pt-5 mt-5 mb-5  justify-content-center {{ Request::is('blog/*')? 'pt-5' : '' }} nav-categories-wrapper">
    <ul class="nav categories-nav">
        <li class="nav-item mr-3">
            <a class="nav-link dropdown-toggle link-sub-blog" data-toggle="collapse" href="#categoriesCollapse" role="button" aria-expanded="false" aria-controls="categoriesCollapse">CATEGORÍAS</a>
            @if(isset($filter))
                @if($filter->all()['filter']=='category')
                    <strong class='d-inline-block p-1 current-category'>
                        <a href="{{route('blog')}}">
                            <span 
                                class="d-flex justify-content-center rounded-circle
                                align-items-center bg-danger text-white btn-clear-category">
                                x
                            </span>
                        </a>
                        {{$filter->all()['category_name']}}
                    </strong>
                @endif
            @endif
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle link-sub-blog" data-toggle="collapse" href="#tagsCollapse" role="button" aria-expanded="false" aria-controls="tagsCollapse">TAGS</a>
            @if(isset($filter))
                @if($filter->all()['filter']=='tag')
                    <strong class='d-inline-block p-1 current-tag'>
                        <a href="{{route('blog')}}">
                            <span 
                                class="d-flex justify-content-center rounded-circle
                                align-items-center bg-danger text-white btn-clear-tag">
                                x
                            </span>
                        </a>
                        {{$filter->all()['tag_name']}}
                    </strong>
                @endif
            @endif
        </li>
    </ul>
</nav>
<div class="collapse" id="categoriesCollapse">
    <div class="d-flex justify-content-center">
        <div class=" p-4">
            @foreach($categories as $category)
                <a href="{{ route( 'blog.search.category',$category->category_slug ) }}">
                    <span class='badge badge-pill badge-orange'>
                        {{$category->name}}&nbsp; 
                        <small class='bg-light text-dark lb-badge-count p-1'>
                            {{$category->articles->count()}}
                        </small> 
                    </span>
                </a>     
            @endforeach
        </div>
    </div>
</div>
<div class=" collapse" id="tagsCollapse">
    <div class=" d-flex justify-content-center">
        <div class=" p-4">
            @foreach($tags as $tag)
                <a href=" {{ route( 'blog.search.tag',$tag->tag_slug ) }} ">
                    <span class='badge badge-pill badge-info'> {{$tag->name}} </span>
                </a>
            @endforeach
        </div>
    </div>
</div>


