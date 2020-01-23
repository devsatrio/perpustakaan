 <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
<thead>
    <tr>
        <th class="text-center" style="width: 50px;">No</th>
        <th>Nama</th>
         <th>Telfon</th>
        <th>Alamat</th>
        <th>Email</th>
        <th class="text-center" style="width: 100px;"><i class="fa fa-flash"></i></th>
    </tr>
</thead>
<tbody id="isitabel">
    @php
    $nomer = 1;
    @endphp
     @foreach ($data as $value)
        <tr>
            <td>{{$nomer++}}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->notelp }}</td>
            <td>{{ $value->alamat}}</td>
            <td>{{ $value->email}}</td>
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