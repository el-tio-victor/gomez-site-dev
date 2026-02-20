{{--
  @param string $class_card opcionalmente recibe como parametr clases extras para nuestro contenedor card
--}}
@php if( !isset($class_card)) $class_card = ''; @endphp
<div class="card {{$class_card}}">
  <div class="card-header">
    {{$header}}
    <div class="card-tools">
      <!-- Buttons, labels, and many other things can be placed here! -->
      {{$tools}}
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    {{$body}}
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    {{$footer}}
  </div>
  <!-- /.card-footer -->
</div>