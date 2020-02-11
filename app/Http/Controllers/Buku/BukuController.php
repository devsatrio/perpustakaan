<?php

namespace App\Http\Controllers\Buku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\models\BukuModel;
use App\models\kategoriModel;
use DataTables;
use QrCode;
use DB;
class BukuController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    public function json(){
        return Datatables::of(BukuModel::select(DB::raw('buku.*,kategori_buku.nama as namakategori'))->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')->where('buku.tipe','Book')->get())->make(true);
    }
    //=================================================================================
    public function carikode($kode){
        $data = BukuModel::where('kode',$kode)->count();
        return response()->json($data);
    }
    //=================================================================================
    public function index(Request $request)
    {
        $data = kategoriModel::orderby('id','desc')->get();
        return view('buku/IndexBuku',['data'=>$data]);
    }

    //=================================================================================
    public function store(Request $request)
    {
        $judulasli = $request->input_judul;
        $judul_lower_name=strtolower($judulasli);
        $judul_replace_space=str_replace(' ', '-', $judul_lower_name);
        if($request->input_umum==''){
            $umum = 'tidak';
        }else{
            $umum = 'ya';
        }
        if($request->hasFile('input_foto')){
            $nameland=$request->file('input_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img/buku');
            $request->file('input_foto')->move($destination,$finalname);

            BukuModel::insert([
                'judul'=>$request->input_judul,
                'penulis'=>$request->input_penulis,
                'halaman'=>$request->input_halaman,
                'tanggal_terbit'=>$request->input_tgl,
                'isbn'=>$request->input_isbn,
                'bahasa'=>$request->input_bahasa,
                'penerbit'=>$request->input_penerbit,
                'berat'=>$request->input_berat,
                'lebar'=>$request->input_lebar,
                'deskripsi'=>$request->input_deskripsi,
                'id_kategori'=>$request->input_kategori,
                'kode'=>$request->input_kode,
                'jumlah'=>$request->input_jumlah,
                'lokasi'=>$request->input_lokasi,
                'gambar'=>$finalname,
                'umum'=>$umum,
                'link'=>$judul_replace_space
            ]);
        }else{
            BukuModel::insert([
                'judul'=>$request->input_judul,
                'penulis'=>$request->input_penulis,
                'halaman'=>$request->input_halaman,
                'tanggal_terbit'=>$request->input_tgl,
                'isbn'=>$request->input_isbn,
                'bahasa'=>$request->input_bahasa,
                'penerbit'=>$request->input_penerbit,
                'berat'=>$request->input_berat,
                'lebar'=>$request->input_lebar,
                'id_kategori'=>$request->input_kategori,
                'deskripsi'=>$request->input_deskripsi,
                'umum'=>$umum,
                'link'=>$judul_replace_space
            ]);
        }
    }
    
    //================================================================================= 
    public function show($id)
    {
      $data = BukuModel::where('id',$id)->get();
      return response()->json($data);
    }

    
    //=================================================================================
    public function update(Request $request, $id)
    {
        $judulasli = $request->edit_judul;
        $judul_lower_name=strtolower($judulasli);
        $judul_replace_space=str_replace(' ', '-', $judul_lower_name);
        if($request->edit_umum==''){
            $umum = 'tidak';
        }else{
            $umum = 'ya';
        }
         if($request->hasFile('edit_foto')){
            File::delete('img/buku/'.$request->edit_fotolama);
            $nameland=$request->file('edit_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img/buku');
            $request->file('edit_foto')->move($destination,$finalname);

            $data = BukuModel::where('id',$request->kode_edit)
            ->update([
                'judul'=>$request->edit_judul,
                'penulis'=>$request->edit_penulis,
                'halaman'=>$request->edit_halaman,
                'tanggal_terbit'=>$request->edit_tgl,
                'isbn'=>$request->edit_isbn,
                'bahasa'=>$request->edit_bahasa,
                'penerbit'=>$request->edit_penerbit,
                'berat'=>$request->edit_berat,
                'lebar'=>$request->edit_lebar,
                'deskripsi'=>$request->edit_deskripsi,
                'id_kategori'=>$request->edit_kategori,
                'kode'=>$request->edit_kode,
                'jumlah'=>$request->edit_jumlah,
                'lokasi'=>$request->edit_lokasi,
                'umum'=>$umum,
                'gambar'=>$finalname,
                'link'=>$judul_replace_space
            ]);
        }else{
            $data = BukuModel::where('id',$request->kode_edit)
            ->update([
                'judul'=>$request->edit_judul,
                'penulis'=>$request->edit_penulis,
                'halaman'=>$request->edit_halaman,
                'tanggal_terbit'=>$request->edit_tgl,
                'isbn'=>$request->edit_isbn,
                'bahasa'=>$request->edit_bahasa,
                'penerbit'=>$request->edit_penerbit,
                'berat'=>$request->edit_berat,
                'lebar'=>$request->edit_lebar,
                'kode'=>$request->edit_kode,
                'jumlah'=>$request->edit_jumlah,
                'lokasi'=>$request->edit_lokasi,
                'umum'=>$umum,
                'id_kategori'=>$request->edit_kategori,
                'deskripsi'=>$request->edit_deskripsi,
                'link'=>$judul_replace_space
            ]);
        }
    }
    
    //=================================================================================
    public function destroy($id)
    {
        $data = BukuModel::find($id);
        if($data->gambar !='n'){
            File::delete('img/buku/'.$data->gambar);
        }
        if($data->ebook !='n'){
            File::delete('fileebook/'.$data->ebook);
        }
        BukuModel::destroy($id);
    }

    public function detailbuku($kode){
        $data = BukuModel::select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
    	->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
    	->where('buku.id',$kode)
        ->first();
        $peminjam = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,anggota.nama as namaanggota, anggota.gambar,anggota.notelp, anggota.status_anggota'))
        ->leftjoin('anggota','anggota.id','=','pinjam.id_anggota')
        ->where('pinjam.id_buku',$kode)
        ->orderby('id','desc')
        ->get();
        return view('buku.Showbuku',['data'=>$data,'peminjam'=>$peminjam]);
    }
}
