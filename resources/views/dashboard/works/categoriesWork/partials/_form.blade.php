@php  $val = ($old_val_input != null)? $old_val_input : old($name_input); /*if(count($errors) > 0)dd($errors);*/ @endphp
<div class='col'>
{!!Form::open(['method'=>'POST', 'route'=>$route ])!!}
	{!! Form::label($name_input,$label_text) !!}
	<div class='input-group input-group-sm'>
		{!! Form::text($name_input, $val ,['class'=>'form-control '.EnvatoHtml::invalidInput($errors->get($name_input)),'placeholder'=>$placeholder,'required','required']) !!}
		@include('dashboard.partials._errors-form',['errors',$errors,'name'=> $name_input])
		<span class="input-group-append">
            
             {!! Form::submit('Guardar',['class'=>'btn btn-success btn-flat'])!!}
        </span>
	</div>
	@isset($id_tech)
		<input name="id_technology" type="hidden" value="{{$id_tech}}">
	@endif
	@if($label_text === 'Actualizar Categoría')
    	<input name="_method" type="hidden" value="PUT">
    @endif
{!!FORM::close()!!}
</div>