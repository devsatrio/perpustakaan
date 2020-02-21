<html>

<body onload="window.print();">
    <table>
        <tr align="center">
            

                @php
                $columns = 4;
                $qrdata = "kode buku : ".$data->kode."\nISBN : ".$data->isbn."\njudul : ".$data->judul;
                @endphp
                @php
                $i=1;
            for($y=0;$y<$data->jumlah;$y++){ @endphp
                <td>
                {!! QrCode::size(180)->generate($qrdata) !!}
                <br>
                {{$data->judul}} ({{$data->kode}})
            </td>
            @php
                if($i % $columns==0){
                echo '</tr>
        <tr>';
            }
            $i++;
            @endphp
            @php } @endphp
        </tr>
    </table>

</body>

</html>