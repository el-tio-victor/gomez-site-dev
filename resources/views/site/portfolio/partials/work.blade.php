<!-- Primer wrapper solo tiene un item  -->
@if( $index == 0 )

    <div class="  p-0 col-12">
    <a href="">
        <div class=" col-12 d-flex  pb-2 pr-3
        justify-content-end  col-sm-6  ">
            <div class="item-work d-flex border">
                @component('site.portfolio.partials._work_content')
                    @slot('title',$title)
                    @slot('services', $services)
                    @slot('detail',$detail)
                    @slot('url', $url )
                    @slot('images', $images )
                    @slot('tt', $tt)
                        @slot('work_slug', $work_slug )
                    @slot('work_category', $work_category )
                    @slot('index',$index)
                @endcomponent
            </div>
        </div>
    </a>
    </div>
@else

<div class=" d-lg-flex 
 @if(($index + 1) % 2 != 0) justify-content-start 
 @else justify-content-end   @endif
 col-12 col-sm-6  pl-2 pr-3 pb-2 pt-3">
  <div 
    class="pb-0  d-flex justify-content-end flex-column  @if(($index + 1) % 2 != 0)  item-up @endif 
      bg-white border p-0  item-work">
      @if($work_slug) <a href="{{route('portfolio.work',$work_slug)}}">@endif
      @component('site.portfolio.partials._work_content')
        @slot('title',$title)
        @slot('services', $services)
        @slot('detail',$detail)
        @slot('url', $url )
        @slot('images', $images )
        @slot('tt', $tt)
		    @slot('work_slug', $work_slug )
        @slot('work_category', $work_category )
        @slot('index',$index)
      @endcomponent
      @if ($work_slug)
        </a>
      @endif
    </div>
    
    
</div>
@endif

