
<div class="d-flex justify-content-center align-items-baseline pl-3">
    @foreach($years as $year)
        <a href="{{route('portfolio',['year'=> $year])}}">

        <span class="mr-3 page-year {!! $activeYear == $year ? 'page-year-active' : ''  !!} ">{{$year}}</span>
        </a>
        
    @endforeach

</div>
