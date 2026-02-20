
@php
    if( !isset($class) )
        $class = '';
    if( !isset( $style ) )
        $style = '' ;
@endphp
<div class="{{$class}}  text-right social" style="{{$style}}">
   <a class='link-hover-black' target='_blank' href='https://www.linkedin.com/in/victor-gomez-45981a14a'>
      <i class='icon-linkedin'></i>
   </a>
   <a class='link-hover-black' target='_blank' href='https://codepen.io/victor-gomez-rodriguez'>
      <i class='mr-1 ml-2 icon-codepen'></i>
   </a>
   <a class='link-hover-black' target='_blank' href='https://github.com/el-tio-victor'>
      <i class='icon-github'></i>
   </a>
</div>
