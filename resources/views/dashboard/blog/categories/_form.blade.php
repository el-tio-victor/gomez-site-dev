{{--
    @param string $method metodo de envio para el formulario
    @param mixed  $route  parametro para accion del formulario
--}}
    @php
        if( $route ===  'categories.store'){
            $name = old('name');
        }
        else{
            $name  = (old('name') != '')  ? old('name') : $category_edit->name;
        }
    @endphp
    <div class="">
    
        {!! Form::open( ['route'=>$route,'method'=>$method] ) !!}
        {!! Form::label("name","Nombre ",['class'=>'col ']) !!}
            <div class="col form-group">
            
                {!! Form::text("name",$name,['class'=>'form-control '.MyHelpers::invalidInput($errors->get('name')), 'placeholder'=>"Nombre Categoría",'required'=>'required']) !!}
                @include('dashboard.partials._errors-form',['errors',$errors,'name'=>'name'])
            </div>
            <div class="col form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-sm btn-success'])!!}
            </div>
        {!! Form::close() !!}
    </div>
    

