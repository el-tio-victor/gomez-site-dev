var id_tech = null
var id_tool = null
$('document').ready(function(){
	
    	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    	
        $('.btn-view, .btn-edit').on('click',function(e){
        	e.preventDefault()
        	let el 		= $(this)
        	id_tech 	= el.data('id_tech')
        	let action  = el.data('action')
        	let url 	= 'techs/'+id_tech+'/edit'
        	let dataType= 'json'
        	if(action === 'view'){
        		url = 'techs/'+id_tech+'/index'
        		dataType= ''
        		//Agrego el nuevo item al menu breadcrum
        		let tech_name = el.data('tech_name')
        		breadcrumView(tech_name)
        	}
        	
        	ajax(url,dataType, action)
            
        })
        
        $(document).on('click','body .btn-edit-tool',function(e){
        	e.preventDefault()
        	let el = $(this)
        	id_tool= el.data('id_tool')
        	let tool_name = el.data('tool_name')
        	toolEdit(tool_name)
        })
        
})
    
function ajax(url,dataType,action){
	$.ajax({
        type:'get',
        url: url,
        dataType: dataType,
        success: function (data) {
           
           if(action === 'view')
        	   $('.tech-wrapper').parent().empty().html(data)
            else{
            	//console.log( data.technology_name )
            	tech_edit( data )
            }
            	
           //$('.tech-wrapper').html(data)
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    })
}

/* Edito l formulario de tecnología para editar cambiando de crear a editar*/
function tech_edit( resp ){
	
	let input 	= $('#technology_name')
	let form 	= input.parents('form')
	let label   = form.find('label')
	
	input.val(resp.technology_name)
	
	form.attr('action','techs/'+id_tech)
	
	form.append("<input name='_method' type='hidden' value='PUT'>")
	
	label.html('Actualizar Tecnología')
	console.log(form)
}

//Modifico el menu breadcrum al ver una tecnologia
//Recibo el nombre de la tecnologia con la variable tech_name para agregarla al breadcrumb
function breadcrumView(tech_name){
	let ol = $('.breadcrumb')
	ol.find('li.active').toggleClass('active')
	.html("<a href='/dashboard/techs'>Tecnologías y Herramientas</a>")
	ol.append("<li class='breadcrumb-item active'>"+tech_name+"</li>")
	
	
}

function toolEdit(tool_name){
	let input 	= $('#tool_name')
	let form 	= input.parents('form')
	let label   = form.find('label')
	label.html('Actualizar Herramienta')
	form.attr('action','tools/'+id_tool)
	form.append("<input name='_method' type='hidden' value='PUT'>")
	input.val(tool_name)
}
