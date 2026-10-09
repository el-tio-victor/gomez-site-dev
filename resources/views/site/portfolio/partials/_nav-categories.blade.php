<!--
    Sub vista con el nav de las categorías de los proyectos 
-->
<div class="pt-5 pb-5 mb-3 d-flex justify-content-center  bg-white nav-categories-wrapper">

<nav class=' nav justify-content-around categories-nav'>
  {{-- En base a la variable slug determino si el item TODOS esta activo caso particular al ingresar
        a página desde otra pagina ( ver todos los proyectos )
      --}}
   @php
    $class_active ='';
    if( ! isset($slug)) $class_active = 'active'; 
   @endphp
  <li class='nav-item '><a href="{{route('portfolio')}}" class=" nav-link {{$class_active}}">TODOS</a></li>
  @foreach($categoriesWork as $cat => $cat_slug)
    @php
  	  $class_active = '';
 	  if(isset($slug)){
        if($slug === $cat_slug)
          $class_active = 'active';
      }      		
    @endphp
  <li class='nav-item'> 
    <a href="{{route('portafolio.search.work',$cat_slug ?? '')}}" class=" nav-link {{ $class_active }}">
      {{ $cat === 'PEN' ? 'PENS' : $cat }}
    </a>
  </li>
  @endforeach
</nav>
</div>

