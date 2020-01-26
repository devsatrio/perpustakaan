<?php

namespace App\Http\Controllers\Buku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\models\BukuModel;
use App\models\kategoriModel;
use DataTables;
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
    public function index(Request $request)
    {
        $data = kategoriModel::orderby('id','desc')->get();
        return view('buku/IndexBuku',['data'=>$data]);
    }

    //=================================================================================
    public function store(Request $request)
    {
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
                'gambar'=>$finalname
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
                'gambar'=>$finalname
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
                'id_kategori'=>$request->edit_kategori,
                'deskripsi'=>$request->edit_deskripsi
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
}
