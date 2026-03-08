<div class="mb-5 col-12  col-md-5 work-techs pt-3">
    <h3 class="">Tecnologías</h3>
    <ul>
        @foreach($work_techs as $tech)
        @php
        $tool_name = $tech->tool->tool_name;
        $tool_name = ($tool_name === "N/A") ? '' : $tool_name ;
        @endphp
        <li class="position-relative">
            <h5 class='mb-0  work-techs-item'>

                {{$tech->technology->technology_name}}


            </h5>
            @if ($tool_name != '')
            <div class="  work-techs-tool-container">
                <small class=" work-techs-tool-item">{{$tool_name}}</small>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>