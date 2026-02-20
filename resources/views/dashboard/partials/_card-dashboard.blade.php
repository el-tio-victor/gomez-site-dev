
<div class='col-md-6 '>
  <div class='border-bottom' style='min-height:220px; '>
    <h3 class='p-2 border card-title col-12' style='float:none'>
      {{$title}}
      <span class='badge badge-pill bg-naranja'>{{$category}}</span>
    </h3>
    <div class='p-3 col-12' style='height:200px; overflow-y:scroll;'>
      <strong>
        <em class='pr-1 fas fa-clock'></em>
        
           {{ \Carbon\Carbon::parse($date)->diffForhumans() }}
      </strong>
      {!! $content !!}
    </div>
  </div>
</div>
