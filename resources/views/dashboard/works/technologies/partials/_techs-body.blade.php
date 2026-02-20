<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>...</th></tr>
    </thead>
    <tbody>
        @foreach($techs as $tech)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td> {{ $tech->technology_name}} </td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('techs.destroy',$tech->id)}}"  class=" btn btn-danger p-0 pl-1 pr-1"
                        	onclick="return confirm('Deseas eliminar este elemento?')"  >
                        	<i class="fas fa-trash"></i>
                        
                        </a>
                        <a href="" data-id_tech="{{$tech->id}}" data-tech_name='{{$tech->technology_name}}' data-action='view' class="btn btn-info p-0 pl-1 pr-1 btn-view">
                        	<i class="fas fa-eye"></i>
                        </a>
                        <a href="" data-id_tech="{{$tech->id}}" data-tech_name='{{$tech->technology_name}}' class="btn btn-warning p-0 btn-edit" data-action='edit'><i class="fas fa-edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>