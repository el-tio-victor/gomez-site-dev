<div class="small-box {{$color_box}}">
  <div class="inner">
    <h3>{{$quantity}}</h3>

    <p>{{$text}}</p>
  </div>
  <div class="icon">
    <i class="ion {{$icon}}"></i>
  </div>
  <div class='small-box-footer'>
  @isset($footer)
    {{$footer}}
  @endif
  </div>
</div>
