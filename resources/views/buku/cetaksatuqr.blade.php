<html>

<body onload="window.print();">
    <table>
        <tr align="center">
            <td>

                @php
                $qrdata = "kode buku : ".$data->kode."\nISBN : ".$data->isbn."\njudul : ".$data->judul;
                @endphp
                {!! QrCode::size(180)->generate($qrdata) !!}
                <br>
                {{$data->judul}} ({{$data->kode}})
            </td>
        </tr>
    </table>

</body>

</html>