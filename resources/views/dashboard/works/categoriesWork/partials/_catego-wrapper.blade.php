{{-- Verifico si se esta modificando una tech --}}
	
	@php
        
        
        // Si esta definida la var id se esta editando una tech (despues de un error de val)
        if( isset($id) ){
        	$label_text = 'Actualizar Categoría';
        	$old_val_input = $old_val_input;
        	$id_edit = $id;
        	$route = ['categoriesWork.update',$id];
        }
        else{
        	$old_val_input = null;
        	$label_text = 'Nueva Categoría';
       		$route = 'categoriesWork.store';
        	
        }
        
    @endphp

<section class="row tech-wrapper">
    <div class="col-md-6">
    	
        @component('dashboard.partials.card')
            @slot('header','Categorias')@slot('tools')@endslot
            @slot('body')
            	@include('dashboard.works.categoriesWork.partials._form',[
            		'name_input'=>'categoryWork_name','route'=>$route,'label_text'=>$label_text,
            		'placeholder' =>'categoria1,categoria2,categoria3',
            		'old_val_input' => $old_val_input
            	])
                @include('dashboard.works.categoriesWork.partials._catego-body')
            @endslot
            @slot('footer')
            	@if(! is_array($categoriesWork)) 
            		{!! $categoriesWork->render() !!}
            	@endif 
            @endslot
        @endcomponent
    </div>
    
</section>