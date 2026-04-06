<nav class="d-flex pt-5 mt-5 mb-2  justify-content-center {{ Request::is('blog/*')? 'pt-5' : '' }} nav-categories-wrapper">
    <ul class="nav categories-nav">
        <li class="nav-item mr-3">
            <a class="nav-link dropdown-toggle link-sub-blog" data-toggle="collapse" href="#categoriesCollapse" role="button" aria-expanded="false" aria-controls="categoriesCollapse">CATEGORÍAS</a>
            @if(isset($filter))
                @if($filter->all()['filter']=='category')
                    <strong class='d-flex align-items-end p-1 current-category'>
                       
                        {{$filter->all()['category_name']}}
                         <a href="{{route('blog')}}">
                            <span 
                                class="ml-3 d-flex align-items-center justify-content-center rounded-circle
                                align-items-center bg-danger text-white btn-clear-category">
                                x
                            </span>
                        </a>
                    </strong>
                @endif
            @endif
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle link-sub-blog" data-toggle="collapse" href="#tagsCollapse" role="button" aria-expanded="false" aria-controls="tagsCollapse">TAGS</a>
            @if(isset($filter))
                @if($filter->all()['filter']=='tag')
                    <strong class='d-flex align-items-end p-1 current-tag'>
                        
                        {{$filter->all()['tag_name']}}
                        <a href="{{route('blog')}}">
                            <span 
                                class="ml-3 d-flex align-items-center rounded-circle
                                align-items-center bg-danger text-white btn-clear-tag">
                                x
                            </span>
                        </a>
                    </strong>
                @endif
            @endif
        </li>
    </ul>
</nav>
<div class="mt-5 collapse bg-naranja" id="categoriesCollapse">
    <div class="d-flex justify-content-center">
        <div class=" p-4">
            @foreach($categories as $category)
                <a href="{{ route( 'blog.search.category',$category->category_slug ) }}">
                    <span class='badge badge-pill bg-white color-naranja'>
                        {{$category->name}}&nbsp; 
                        <small class='lb-badge-count p-1'>
                            {{$category->articles->count()}}
                        </small> 
                    </span>
                </a>     
            @endforeach
        </div>
    </div>
</div>
<div class="bg-info collapse" id="tagsCollapse">
    <div class=" d-flex justify-content-center">
        <div class=" wrap-nav-tags p-4">
            @foreach($tags as $tag)
                <a href=" {{ route( 'blog.search.tag',$tag->tag_slug ) }} ">
                    <span class='badge badge-pill bg-white'> {{$tag->name}} </span>
                </a>
            @endforeach
        </div>
    </div>
</div>


