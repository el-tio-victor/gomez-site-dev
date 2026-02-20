<div class="col-12 col-sm-8 col-md-5 work-techs ">
    <h3 class="color-naranja">Tecnologías</h3>
    <ul>
    @foreach($work_techs as $tech)
	@php
		$tool_name = $tech->tool->tool_name;
		$tool_name = ($tool_name === "N/A") ? '' : $tool_name ;
	@endphp 
	<li>
		<h5 class='mb-0 work-techs-item'>
		{{$tech->technology->technology_name}}
            <svg width="25" height="25" viewBox="0 0 35 35" >
                <path d="M19.414 27.414l10-10c0.781-0.781 0.781-2.047 0-2.828l-10-10c-0.781-0.781-2.047-0.781-2.828 0s-0.781 2.047 0 2.828l6.586 6.586h-19.172c-1.105 0-2 0.895-2 2s0.895 2 2 2h19.172l-6.586 6.586c-0.39 0.39-0.586 0.902-0.586 1.414s0.195 1.024 0.586 1.414c0.781 0.781 2.047 0.781 2.828 0z"></path>
            </svg>
        <small>{{$tool_name}}</small>
</h5>
	</li>
    @endforeach
    </ul>
</div>
