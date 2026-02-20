{{-- Verifico si se esta modificando una tech --}}
	
	@php
        
        
        // Si esta definida la var id se esta editando una tech (despues de un error de val)
        if( isset($id) ){
        	$label_text = 'Actualizar Tecnología';
        	$old_val_input = $old_val_input;
        	$id_edit = $id;
        	$route = ['techs.update',$id];
        }
        else{
        	$old_val_input = null;
        	$label_text = 'Nueva Tecnología';
       		$route = 'techs.store';
        	
        }
        
    @endphp

<section class="row tech-wrapper">
    <div class="col-md-6">
    	
        @component('dashboard.partials.card')
            @slot('header','Tecnologías')@slot('tools')@endslot
            @slot('body')
            	@include('dashboard.works.technologies.partials._form',[
            		'name_input'=>'technology_name','route'=>$route,'label_text'=>$label_text,
            		'placeholder' =>'Tecnología1, Tecnología2, Tecnología3',
            		'old_val_input' => $old_val_input
            	])
                @include('dashboard.works.technologies.partials._techs-body')
            @endslot
            @slot('footer')
            	@if(! is_array($techs)) 
            		{!! $techs->render() !!}
            	@endif 
            @endslot
        @endcomponent
    </div>
    <div class="col-md-6 index-tools">
    
        @component('dashboard.partials.card')
            @slot('header','Herramientas')@slot('tools')@endslot
            @slot('body')
	 {{--   	@isset( $action ) --}}
            		@include('dashboard.works.technologies.partials._form',[
            			'name_input'=>'tool_name','route'=>'techs.storeTool','label_text'=>'Nueva Herramienta',
            			'placeholder'=>'Herramienta1, Herramienta2, Herramienta3',
            			'id_tech' => $techs[0]->id
            		])
	    {{--	@endif --}}
            	
                @include('dashboard.works.technologies.partials._tools-body')
            @endslot
            @slot('footer') 
            	
            @endslot
        @endcomponent
    </div>
</section>
