<div class="cont-work-img">
    <div class="elements">
        @foreach($images as $image)
        @if( MyHelpers::typeFile($image->name ) === 'image' )
        <img class='' style="width:100%" src="{{asset('images/works/'.$image->name)}}" alt="">
        @elseif( MyHelpers::typeFile($image->name)=== 'video' )
        @component('site.portfolio.partials._work-video',['class' => 'work-img media-responsive'])
        @slot('src',$image->name)
        @endcomponent
        @endif

        @endforeach
    </div>
</div>

<div class="col-12 mb-2 p-0 d-flex flex-column 
        justify-content-end align-items-start wrapper-text">
    <div class="p-md-2 bg-white  text">
        <div class=" p-2">
            <h2 class="title mb-0">{{$title}}</h2>
            <span class="d-inline-block ml-3 text-light bg-secondary p-2">
                {{$work_category}}
            </span>
            <div class="pl-3 mt-3  work-info-techs">
                @foreach($tt as $techs_tool)
                <small class='mr-1 mt-1 mb-1 badge badge-tech'>
                    @php $tool_name = $techs_tool->tool->tool_name;
                    $tool_name = ( $tool_name === "N/A") ? "" : " / ".$tool_name ;
                    @endphp
                    {!! $techs_tool->technology->technology_name. $tool_name !!}
                </small>
                @endforeach
            </div>
        <div class="p-2 mt-3 d-flex justify-content-center align-items-center   border ">
            <span class='pr-2'>ver mas </span>
            <span style="font-size: 1.5rem;" class="icon-point-right"></span>
        </div>
        </div>
    </div>
</div>