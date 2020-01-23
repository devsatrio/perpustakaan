 <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
<thead>
    <tr>
        <th class="text-center" style="width: 50px;">No</th>
        <th class="text-center">Peminjam</th>
         <th class="text-center">judul</th>
        <th class="text-center">Admin</th>
        <th class="text-center">Tanggal Pinjam</th>
        <th class="text-center">Maksimal Pengembalian</th>
        <th class="text-center">Tanggal Pengembalian</th>
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
            <td>{{ $value->nama }}</td>
            <td>{{ $value->judul }}</td>
            <td>{{ $value->username}}</td>
            <td>{{ $value->tgl_pinjam}}</td>
            <td>{{$value->tgl_harus_kembali}}</td>
            <td>{{$value->tgl_kembali}}</td>
            <td class="text-center">
                @php 
                $date1 = date_parse(date('Y-m-d'));
                $date2 = date_parse($value->tgl_harus_kembali);
                @endphp
                @if($value->tgl_kembali =='')
                @if($date1<=$date2)
                <button class="btn btn-success" onclick="updatestatus({{$value->id}})">
                    <i class="fa fa-check"></i>
                </button>
                @else
                <button class="btn btn-danger" onclick="updatedenda({{$value->id}},{{$value->id_anggota}})">
                    <i class="fa fa-check"></i>
                </button>
                @endif
                @endif
            </td>
        </tr>
        @endforeach                                
</tbody>
</table>
{!! $data->render() !!}