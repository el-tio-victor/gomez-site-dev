<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>...</th></tr>
    </thead>
    <tbody>
        @foreach($categoriesWork as $category)
            <tr>
                <td>{{ $loop->index +1 }}</td>
                <td> {{ $category->categoryWork_name}} </td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('categoriesWork.destroy',$category->id)}}"  class=" btn btn-danger p-0 pl-1 pr-1"
                        	onclick="return confirm('Deseas eliminar este elemento?')"  >
                        	<i class="fas fa-trash"></i>
                        
                        </a>
                        
                        <a href="" data-id_catego="{{$category->id}}" data-catego_name='{{$category->categoryWork_name}}' class="btn btn-warning p-0 btn-edit" data-action='edit'><i class="fas fa-edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>