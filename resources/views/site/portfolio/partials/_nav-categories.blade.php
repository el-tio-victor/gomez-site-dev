<!--
    Sub vista con el nav de las categorías de los proyectos 
-->
<nav class=' nav justify-content-around categories-nav'>
  {{-- En base a la variable slug determino si el item TODOS esta activo caso particular al ingresar
        a página desde otra pagina ( ver todos los proyectos )
      --}}
   @php
    $class_active ='';
    if( ! isset($slug)) $class_active = 'active'; 
   @endphp
  <li class='nav-item '><a href="{{route('portfolio')}}" class=" nav-link {{$class_active}}">TODOS</a></li>
  @foreach($categoriesWork as $cat)
    @php
  	  $class_active = '';
 	  if(isset($slug)){
        if($slug === $cat->categoryWork_slug)
          $class_active = 'active';
      }      		
    @endphp
  <li class='nav-item'> 
    <a href="{{route('portafolio.search.work',$cat->categoryWork_slug)}}" class=" nav-link {{ $class_active }}">
      {{ $cat->categoryWork_name === 'PEN' ? 'PENS' : $cat->categoryWork_name }}
    </a>
  </li>
  @endforeach
</nav>
