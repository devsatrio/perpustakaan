<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class pinjamexport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function __construct(string $tglsatu,string $tgldua)
    {
        $this->tglsatu = $tglsatu;
        $this->tgldua = $tgldua;
    }
    public function collection()
    {
        return DB::table('pinjam')
        ->select(DB::raw('anggota.nama,buku.judul,users.username,pinjam.tgl_pinjam,pinjam.tgl_harus_kembali,pinjam.tgl_kembali'))
        ->join('anggota','anggota.id','=','pinjam.id_anggota')
        ->join('buku','buku.id','=','pinjam.id_buku')
        ->join('users','users.id','=','pinjam.id_user')
        ->whereBetween('pinjam.tgl_pinjam', [$this->tglsatu, $this->tgldua])
        ->orderby('pinjam.id','desc')
        ->get();
        
    }
    public function headings(): array
    {
        return [
            'Peminjam',
            'judul',
            'Admin',
            'Tanggal Pinjam',
            'Maksimal Pengembalian',
            'Tanggal Pengembalian',
        ];
    }
}
