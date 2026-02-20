$('document').ready(function(){
	
    	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    	
        $('.btn-view, .btn-edit').on('click',function(e){
        	e.preventDefault()
        	let el 		= $(this)
        	id_catego 	= el.data('id_catego')
        	let catego_name = el.data('catego_name')
        	
        	//let url 	= 'techs/'+id_tech+'/edit'
        	//let dataType= 'json'
        	
        	catego_edit( id_catego, catego_name)
        	//ajax(url,dataType, action)
            
        })
        
        
        
})

/* Edito l formulario de tecnología para editar cambiando de crear a editar*/
function catego_edit( id, name ){
	
	let input 	= $('#categoryWork_name')
	let form 	= input.parents('form')
	let label   = form.find('label')
	
	input.val(name)
	
	form.attr('action', 'categoriesWork/'+id)
	
	form.append("<input name='_method' type='hidden' value='PUT'>")
	
	label.html('Actualizar Categoría')
	console.log(form)
}