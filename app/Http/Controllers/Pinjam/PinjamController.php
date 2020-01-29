<?php

namespace App\Http\Controllers\Pinjam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use DataTables;

class PinjamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    public function json(){
        return Datatables::of(DB::table('pinjam')
        ->select(DB::raw('pinjam.*,users.username,anggota.nama,buku.judul'))
        ->join('anggota','anggota.id','=','pinjam.id_anggota')
        ->join('buku','buku.id','=','pinjam.id_buku')
        ->join('users','users.id','=','pinjam.id_user')
        ->orderby('pinjam.id','desc')
        ->get())->make(true);
    }
    
    //=================================================================================
    public function pinjam(){
        return view('peminjaman/pinjam');
    }
    //================================================================================= 
    public function carianggota(Request $request){
        if($request->has('q')){
            $cari = $request->q;
            $data = DB::table('anggota')
            ->select('id','nama')
            ->where('nama','like','%'.$cari.'%')
            ->get();
            return response()->json($data);
        }
    }
    //================================================================================= 
    public function carihasilanggota($id){
        $data = DB::table('anggota')
        ->where('id',$id)
        ->get();
        return response()->json($data);
    }
    //================================================================================= 
    public function caribuku(Request $request){
        if($request->has('q')){
            $cari = $request->q;

            $data = DB::table('buku')
            ->select('id','judul')
            ->where([['judul','like','%'.$cari.'%'],['tipe','Book']])
            ->get();
            return response()->json($data);
        }
    }
    //================================================================================= 
    public function carihasilbuku($id){
        $data = DB::table('buku')
        ->where('id',$id)
        ->get();
        return response()->json($data);
    }
    //================================================================================= 
    public function daftarpinjam(Request $request){
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,users.username,anggota.nama,buku.judul'))
        ->join('anggota','anggota.id','=','pinjam.id_anggota')
        ->join('buku','buku.id','=','pinjam.id_buku')
        ->join('users','users.id','=','pinjam.id_user')
        ->orderby('pinjam.id','desc')
        ->get();
        $setting = DB::table('setting')->orderby('id','desc')->first();
        return view('peminjaman/daftarpinjam',['data'=>$data,'setting'=>$setting]);
    }

    //================================================================================= 
    public function daftarfavorit()
    {
        // $data = DB::table('pinjam')
        // ->select(DB::raw('pinjam.id_buku,pinjam.tgl_pinjam,MONTH(pinjam.tgl_pinjam) as bulan, YEAR(pinjam.tgl_pinjam) as tahun,buku.judul,buku.penulis,COUNT(*) as jumlah'))
        // ->join('buku','buku.id','=','pinjam.id_buku')
        // ->groupby('pinjam.id_buku')
        // ->groupby('bulan')
        // ->groupby('tahun')
        // ->orderby('pinjam.tgl_pinjam','desc')
        // ->get();

        $data = DB::table('buku')->where('tipe','Book')->orderby('dipinjam','desc')->get();
        return view('peminjaman/favorit',['data'=>$data]);
    }
    //================================================================================= 
    public function daftarebookfavorit()
    {
        $data = DB::table('buku')->where('tipe','Ebook')->orderby('dibaca','desc')->get();
        return view('peminjaman.ebookfavorit',['data'=>$data]);
    }
    //================================================================================= 
    public function store(Request $request)
    {
        $databuku = DB::table('buku')->find($request->kode_buku);
        $newpijam = $databuku->dipinjam + 1;
        DB::table('buku')->where('id',$request->kode_buku)
        ->update([
            'dipinjam'=>$newpijam
        ]);
        DB::table('anggota')->where('id',$request->kode_anggota)
        ->update([
            'status_pinjam'=>'y'
        ]);
        DB::table('pinjam')
        ->insert([
            'id_user' => $request->kode_user,
            'id_anggota' => $request->kode_anggota,
            'id_buku' => $request->kode_buku,
            'tgl_pinjam' => $request->tanggal_pinjam,
            'tgl_harus_kembali' => $request->tanggal_kembali
        ]);
    }
    //================================================================================= 
    public function updatestatus($id)
    {
        $data = DB::table('pinjam')->where('id',$id)->first();
        DB::table('anggota')->where('id',$data->id_anggota)
        ->update([
            'status_pinjam'=>'n'
        ]);
        DB::table('pinjam')->where('id',$id)
        ->update([
            'tgl_kembali'=>date('Y-m-d')
        ]);    
    }

    public function edit($id)
    {
        //
    }
    //================================================================================= 
    public function simpandenda(Request $request)
    {
        DB::table('pinjam')
        ->where('id',$request->kode)
        ->update([
            'tgl_kembali'=>date('Y-m-d'),
            'denda'=>$request->jumlah,
            'denda_lain'=>$request->jumlah_lain,
            'keterangan_denda'=>$request->keterangan,
        ]);
    }
    //================================================================================= 
    public function peminjamaktif()
    {
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,anggota.nama,anggota.alamat,anggota.notelp,COUNT(*) as jumlah'))
        ->join('anggota','anggota.id','=','pinjam.id_anggota')
        ->groupby('pinjam.id_anggota')
        ->orderby('jumlah','desc')
        ->get();
        return view('peminjaman\peminjamaktif',['data'=>$data]);
    }
    //=====================================================================================
    public function caripeminjaman($id){
        $data = DB::table('pinjam')
        ->where('id',$id)
        ->get();
        return response()->json($data);
    }
}
