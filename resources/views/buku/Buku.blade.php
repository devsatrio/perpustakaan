 <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
<thead>
    <tr>
        <th class="text-center" style="width: 50px;">No</th>
        <th>Judul</th>
         <th>Penulis</th>
        <th class="text-center" style="width: 100px;"><i class="fa fa-flash"></i></th>
    </tr>
</thead>
<tbody id="isitabel">
    @php
    $nomer = 1;
    @endphp
     @foreach ($data as $value)
        <tr>
            <td class="text-center">{{$nomer++}}</td>
            <td>{{ $value->judul }}</td>
            <td>{{ $value->penulis }}</td>
            <td>
                <button class="btn btn-success" onclick="editdata({{$value->id}})">
                    <i class="fa fa-wrench"></i>
                </button>
                <button class="btn btn-danger" onclick="hapusdata({{$value->id}})">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach                                
</tbody>
</table>
{!! $data->render() !!}