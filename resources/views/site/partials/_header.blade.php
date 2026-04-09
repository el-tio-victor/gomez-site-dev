@php 
if( ! isset( $class_flex_childs ) ){
    $class ='justify-content-center align-items-center';
}else{
    $class = $class_flex_childs;
}
if( ! isset( $class_header_video ) ) $class_header_video = '';
@endphp
<header class=' header-main'>
        @component('site.partials._nav-main')
        @endcomponent
        <section class="container-fluid  d-flex {{$class.' '.$class_header_video}} header-main-wrapper  ">
            {{$slot}}
        </section>
        
</header>
