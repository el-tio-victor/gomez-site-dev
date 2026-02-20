<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">Blog</li>
          @if(auth::user()->admin())
          <li class="nav-item">
            <a href=" {{route('users.index')}} " class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item  ">
            <a href=" {{route('articles.index')}} " class="nav-link {{ Request::is('dashboard/articles','dashboard/articles/*') ? ' active ' : ''}}">
              <i class="nav-icon far fa-newspaper"></i>
              <p>
                Artículos
              </p>
            </a>
          </li>
          <li class="nav-item  ">
            <a href=" {{ route('categories.index')}} " class="nav-link {{ Request::is('dashboard/categories','dashboard/categories/*') ? ' active ' : ''}}">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Categorias
              </p>
            </a>
          </li>
          <li class="nav-item  ">
            <a href="{{route('tags.index')}}" class="nav-link {{ Request::is('dashboard/tags','dashboard/tags/*') ? ' active ' : ''}}">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Request::is('dashboard/images/*') || Request::is('dashboard/images') ? ' active ' : ''}}">
              <i class="nav-icon far fa-images"></i>
              <p>
                Imágenes
                <i class=" fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item  ">
                <a href=" {{route('images.index')}} " class="nav-link {{ Request::is('dashboard/images') ? ' active ' : ''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Imágenes principales</p>
                </a>
              </li>
              <li class="nav-item  ">
                <a href=" {{route('images.indexGenerals')}} " class="nav-link {{ Request::is('dashboard/images/generals','dashboard/images/generals/*') ? ' active ' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Imágenes generales</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
          <li class="nav-header">Portafolio</li>
          <li class="nav-item ">
            <a href="  {{route('works.index')}} " class="nav-link {{ Request::is('dashboard/works','dashboard/works/*') ? ' active ' : ''}}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Proyectos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="  {{route('techs.index')}} " class="nav-link {{ Request::is('dashboard/techs','dashboard/techs/*') ? ' active ' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Tecnologías/Herramientas</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="  {{route('categoriesWork.index')}} " class="nav-link {{ Request::is('dashboard/categoriesWork','dashboard/categoriesWork/*') ? ' active ' : ''}}">
              <i class="nav-icon fab fa-buffer"></i>
              <p>Categorías</p>
            </a>
          </li>
        </ul>
      </nav>
