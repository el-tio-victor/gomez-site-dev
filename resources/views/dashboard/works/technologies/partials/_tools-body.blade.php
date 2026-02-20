<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>...</th></tr>
    </thead>
    <tbody>
        @foreach($tools as $tool)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td> {{$tool->tool_name}} </td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('tools.destroy',$tool->id)}}" class="btn btn-danger p-0 pl-1 pr-1"><i class="fas fa-trash"></i></a>
                        <a href=""  data-id_tool='{{$tool->id}}' data-tool_name='{{$tool->tool_name
                        }}' class="btn btn-warning p-0 btn-edit-tool"><i class="fas fa-edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>