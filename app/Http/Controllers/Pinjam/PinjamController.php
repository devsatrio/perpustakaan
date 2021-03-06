<?php

namespace App\Http\Controllers\Pinjam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\pinjamexport;
use Maatwebsite\Excel\Facades\Excel;
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
    public function logbuku($id){
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,anggota.nama,anggota.notelp'))
        ->leftjoin('anggota','anggota.id','pinjam.id_anggota')
        ->where('pinjam.id_buku',$id)
        ->orderby('pinjam.id','desc')
        ->get();
        $buku = DB::table('buku')
        ->where('buku.id',$id)
        ->first();
        return view('peminjaman.logbuku',['buku'=>$buku,'data'=>$data]);
    }
    //================================================================================= 
    public function logebook($id){
        $data = DB::table('baca')
        ->select(DB::raw('baca.*,anggota.nama,anggota.notelp'))
        ->leftjoin('anggota','anggota.id','baca.id_anggota')
        ->where('baca.id_ebook',$id)
        ->orderby('baca.id','desc')
        ->get();
        $ebook = DB::table('buku')
        ->where('buku.id',$id)
        ->first();
        return view('peminjaman.logebook',['ebook'=>$ebook,'data'=>$data]);
    }
    //================================================================================= 
    public function daftarfavorit()
    {
        $data = DB::table('buku')->where('tipe','Book')->orderby('dipinjam','desc')->get();
        return view('peminjaman.favorit',['data'=>$data]);
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
        $newjumlah = $databuku->jumlah - 1;

        DB::table('buku')->where('id',$request->kode_buku)
        ->update([
            'dipinjam'=>$newpijam,
            'jumlah'=>$newjumlah,
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
        $databuku = DB::table('buku')->where('id',$data->id_buku)->first();
        $newjumlah = $databuku->jumlah + 1;
        DB::table('buku')->where('id',$data->id_buku)
        ->update([
            'jumlah'=>$newjumlah,
        ]);
        
        DB::table('anggota')->where('id',$data->id_anggota)
        ->update([
            'status_pinjam'=>'n'
        ]);

        DB::table('pinjam')->where('id',$id)
        ->update([
            'tgl_kembali'=>date('Y-m-d')
        ]);    
    }

    //================================================================================= 
    public function laporan()
    {
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,users.username,anggota.nama,buku.judul'))
        ->join('anggota','anggota.id','=','pinjam.id_anggota')
        ->join('buku','buku.id','=','pinjam.id_buku')
        ->join('users','users.id','=','pinjam.id_user')
        ->orderby('pinjam.id','desc')
        ->get();
        return view('peminjaman.laporanpinjam',['data'=>$data]);
    }
    //=================================================================================
    public function carilaporan(Request $request){
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,users.username,anggota.nama,buku.judul'))
        ->join('anggota','anggota.id','=','pinjam.id_anggota')
        ->join('buku','buku.id','=','pinjam.id_buku')
        ->join('users','users.id','=','pinjam.id_user')
        ->whereBetween('pinjam.tgl_pinjam', [$request->tgl_satu, $request->tgl_dua])
        ->orderby('pinjam.id','desc')
        ->get();
        return view('peminjaman.carilaporanpinjam',['data'=>$data,'tglsatu'=>$request->tgl_satu,'tgldua'=>$request->tgl_dua]);
    }
    //================================================================================= 
    public function simpandenda(Request $request)
    {
        $data = DB::table('pinjam')->where('id',$request->kode)->first();
        DB::table('anggota')->where('id',$data->id_anggota)
        ->update([
            'status_pinjam'=>'n'
        ]);
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
        return view('peminjaman.peminjamaktif',['data'=>$data]);
    }
    
    //=====================================================================================
    public function caripeminjaman($id){
        $data = DB::table('pinjam')
        ->where('id',$id)
        ->get();
        return response()->json($data);
    }

    //=====================================================================================
    public function exportlaporan($tglsatu,$tgldua){
        $namafile = "peminjaman tgl ".$tglsatu."-".$tgldua.".xlsx";
        return Excel::download(new pinjamexport($tglsatu,$tgldua),$namafile);
    }

    //=====================================================================================
    public function statistikbulan(){
        return view('peminjaman.caristatistik');
    }

    //=====================================================================================
    public function tampilstatistikbulan(Request $request){
        $datapinjam = DB::table('pinjam')
        ->select(DB::raw("COUNT(*) as jumlahnya,MONTH(tgl_pinjam) as bulan,YEAR(tgl_pinjam) as tahun"))
        ->whereBetween('tgl_pinjam',[$request->tgl_satu,$request->tgl_dua])
        ->orderBy('tgl_pinjam','asc')
        ->groupBy(DB::raw("MONTH(tgl_pinjam)"))
        ->groupBy(DB::raw("YEAR(tgl_pinjam)"))
        ->get();
        

        $databaca = DB::table('baca')
        ->select(DB::raw("COUNT(*) as jumlahnya,MONTH(tanggal) as bulan,YEAR(tanggal) as tahun"))
        ->whereBetween('tanggal',[$request->tgl_satu,$request->tgl_dua])
        ->orderBy('tanggal','asc')
        ->groupBy(DB::raw("MONTH(tanggal)"))
        ->groupBy(DB::raw("YEAR(tanggal)"))
        ->get();
        return view('peminjaman.statistik',['datapinjam'=>$datapinjam,'databaca'=>$databaca,'tgl_satu'=>$request->tgl_satu,'tgl_dua'=>$request->tgl_dua]);
    }
}
