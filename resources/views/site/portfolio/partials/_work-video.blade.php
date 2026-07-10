@php
    if (!isset($class)) {
        $class = '';
    }
@endphp
<div class="mt-4 col-12 col-md-7 col-lg-6">
    <video loop autoplay muted class='img-fluid {{ $class }} work_image_main'>
        <source src="{{ asset('images/works/' . $src) }}" type='video/mp4'>
    </video>
</div>
