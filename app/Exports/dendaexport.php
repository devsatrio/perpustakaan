<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

class dendaexport implements FromCollection,WithHeadings, ShouldAutoSize
{
    public function __construct(string $tglsatu,string $tgldua)
    {
        $this->tglsatu = $tglsatu;
        $this->tgldua = $tgldua;
    }
    public function collection()
    {
        return DB::table('pinjam')
        ->select(DB::raw('anggota.nama,buku.judul,pinjam.tgl_kembali,pinjam.tgl_harus_kembali,pinjam.denda,pinjam.denda_lain,pinjam.keterangan_denda'))
        ->leftJoin('anggota','anggota.id','=','pinjam.id_anggota')
        ->leftJoin('buku','buku.id','=','pinjam.id_buku')
        ->whereNotNull('pinjam.denda')
        ->whereBetween('pinjam.tgl_kembali', [$this->tglsatu, $this->tgldua])
        ->orderby('pinjam.id','desc')
        ->get();
        
    }
    public function headings(): array
    {
        return [
            'Anggota',
            'Judul Buku',
            'Tgl Pengembalian',
            'Tgl Max Pengembalian',
            'Denda Keterlambatan',
            'tidak_masuk',
            'Denda Lain',
            'Keterangan',
        ];
    }
}
