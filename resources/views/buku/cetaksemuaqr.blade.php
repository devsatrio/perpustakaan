<html>

<body onload="window.print();">
    <table>
        <tr>
            @php
            $count = count($data);
            $columns = 4;
            @endphp

            @foreach($data as $i => $row)

            @php
            for($y=0;$y<$row->jumlah;$y++){ @endphp

                <td align="center">
                    @php

                    $qrdata = "kode buku : ".$row->kode."\nISBN : ".$row->isbn."\njudul : ".$row->judul;
                    @endphp
                    {!! QrCode::size(180)->generate($qrdata) !!}
                    <br>
                    {{$row->judul}} ({{$row->kode}})
                </td>

                @php
                if($i % $columns==0){
                echo '</tr>
        <tr>';
            }
            $i++;
            @endphp
            @php } @endphp
            @endforeach
        </tr>
    </table>
</body>

</html>