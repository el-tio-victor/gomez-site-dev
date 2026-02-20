<nav class='col-12  navbar-main'>
    <div class=" d-flex align-items-center container navbar-main-wrapper">
        <div class="logo">  
            <img src="{{asset('images/page/g-s-black.svg')}}" alt="gomez-site">
        </div>
        
        <div class="col-11  col-sm-12 pr-0 mr-0  nav-main">
            <div class=" d-flex justify-content-end nav-main-wrapper">
                <div class=" p-1 btn-menu">
                    <span class="d-block slash-top"></span>
                    <span class="d-block slash-middle"></span>
                    <span class="d-block slash-bottom"></span>
                </div>
                <div class=" d-flex d-sm-block align-items-start pt-4 pt-sm-0 pl-3 pr-sm-0  nav-main-items">
                    <div class='d-sm-flex mt-5 pt-3 mt-sm-0 pt-sm-0'>
                        <a href="{{route('home')}}">
                        	<div class="p-2 p-sm-1  mr-sm-3 item {{ Request::is('/','\//*') ? ' active ' : ''}}">
                        		<span>INICIO</span>
                        	</div>
                        </a>
                        <a href="{{route('portfolio')}}">
                        	<div 
                                class=" p-2 p-sm-1  mr-sm-3 mt-3 mt-sm-0 mb-3 mb-sm-0 item
                                 {{ Request::is('portafolio','portafolio/*') ? ' active ' : ''}}">
                        		<span>PROYECTOS</span>
                        	</div>
                        </a>
                        <a href="{{route('blog')}}">
                        	<div class="p-2 p-sm-1  item {{ Request::is('blog','blog/*') ? ' active ' : ''}}">
                        		<span>BLOG</span>
                        	</div>
                        </a>
                        <a href="{{route('login')}}">
                        	<div class="p-2 pl-sm-1 pt-sm-1 pr-sm-1 pb-sm-0 mt-3 mt-sm-0 ml-sm-4 item btn-login">
                        		<span class='icon icon-user'></span>
                        	</div>
                        </a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>   
</nav>