@php if(  !isset($class)   ) $class= ''; @endphp
<video loop autoplay muted class=' {{$class}}' >
    <source src="{{asset('images/works/'.$src)}}" type='video/mp4' >
</video>

