
<div class="d-flex justify-content-center align-items-end pl-3">
    @foreach($years as $year)
        <span class="mr-3 page-year {!! $loop->first ? 'page-year-active' : ''  !!} ">{{$year}}</span>
        
    @endforeach

</div>
