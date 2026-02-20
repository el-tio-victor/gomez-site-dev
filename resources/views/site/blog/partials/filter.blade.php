@if($filter == 'category')
<div class='ml-3'>

    	<strong class="">Categoría</strong>
	<span class='badge-tech'>	{{$filter_obj['category_name']}}</span>
</div>
@elseif( $filter == 'tag' )
<div class='ml-3'>
    <strong class=''>Tag</strong>
    <span class="badge-tech">
		{{$filter_obj['tag_name']}}
</span>
</div>
@endif 
