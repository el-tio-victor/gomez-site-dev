<div class="mb-5 col-12  col-md-5 work-techs pt-3">
    <h3 class="text-white">Tecnologías</h3>
    <ul>
        @foreach($work_techs as $tech)
        @php
        $tool_name = $tech->tool->tool_name;
        $tool_name = ($tool_name === "N/A") ? '' : $tool_name ;
        @endphp
        <li class="position-relative">
            <h5 class='mb-0 work-techs-item'>
                <!-- svg quimico -->
                <svg width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#ea5106">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: #FFFFFF;
                                    stroke-miterlimit: 10;
                                    stroke-width: 1.91px;
                                }
                            </style>
                        </defs>
                        <g id="Chemical">
                            <line class="cls-1" x1="7.23" y1="1.5" x2="16.77" y2="1.5"></line>
                            <path class="cls-1" d="M9.14,1.5v9.55L3.41,16.77v3.82A1.9,1.9,0,0,0,5.32,22.5H18.68a1.9,1.9,0,0,0,1.91-1.91V16.77l-5.73-5.72V1.5"></path>
                            <path class="cls-1" d="M4.24,15.94c1.36.4,1.64,1.79,3.46,1.79,2.15,0,2.15-1.91,4.29-1.91s2.16,1.91,4.31,1.91c1.82,0,2.1-1.39,3.46-1.79"></path>
                            <line class="cls-1" x1="12.95" y1="11.05" x2="14.86" y2="11.05"></line>
                            <line class="cls-1" x1="12.95" y1="8.18" x2="14.86" y2="8.18"></line>
                            <line class="cls-1" x1="12.95" y1="5.32" x2="14.86" y2="5.32"></line>
                        </g>
                    </g>
                </svg>
                {{$tech->technology->technology_name}}
               
                
            </h5>
             @if ($tool_name != '')
                    <div class="bg-naranja  work-techs-tool-container">
                        <small class="text-white work-techs-tool-item">{{$tool_name}}</small>
                    </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>