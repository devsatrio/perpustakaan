<?php

namespace App\Http\Controllers\ebook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\BukuModel;
use App\models\kategoriModel;
use Illuminate\Support\Facades\File;
use DataTables;
use DB;
class ebookcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    public function index()
    {
        $data = kategoriModel::orderby('id','desc')->get();
        return view('ebook.index',['data'=>$data]);
    }

    //=================================================================================
    public function json(){
        return Datatables::of(BukuModel::select(DB::raw('buku.*,kategori_buku.nama as namakategori'))->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')->where('buku.tipe','Ebook')->get())->make(true);
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
        if($request->hasFile('input_pdf')){
            $namepdfland=$request->file('input_pdf')->
            getClientOriginalname();
            $lowerpdf_file_name=strtolower($namepdfland);
            $replacepdf_space=str_replace(' ', '-', $lowerpdf_file_name);
            $finalpdfname=time().'-'.$replacepdf_space;
            $destinationpdf=public_path('fileebook');
            $request->file('input_pdf')->move($destinationpdf,$finalpdfname);
        }else{
            $finalpdfname='n';
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
                'tanggal_terbit'=>$request->input_tgl,
                'isbn'=>$request->input_isbn,
                'penerbit'=>$request->input_penerbit,
                'deskripsi'=>$request->input_deskripsi,
                'id_kategori'=>$request->input_kategori,
                'tipe'=>'Ebook',
                'gambar'=>$finalname,
                'ebook'=>$finalpdfname,
                'umum'=>$umum,
                'link'=>$judul_replace_space,
                'bahasa'=>$request->input_bahasa,
                'halaman'=>$request->input_halaman,
            ]);
        }else{
            BukuModel::insert([
                'judul'=>$request->input_judul,
                'tanggal_terbit'=>$request->input_tgl,
                'isbn'=>$request->input_isbn,
                'penerbit'=>$request->input_penerbit,
                'deskripsi'=>$request->input_deskripsi,
                'id_kategori'=>$request->input_kategori,
                'tipe'=>'Ebook',
                'ebook'=>$finalpdfname,
                'umum'=>$umum,
                'link'=>$judul_replace_space,
                'bahasa'=>$request->input_bahasa,
                'halaman'=>$request->input_halaman,
            ]);
        }
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
        if($request->hasFile('edit_pdf')){
            File::delete('fileebook/'.$request->edit_filelama);
            $namepdfland=$request->file('edit_pdf')->
            getClientOriginalname();
            $lowerpdf_file_name=strtolower($namepdfland);
            $replacepdf_space=str_replace(' ', '-', $lowerpdf_file_name);
            $finalpdfname=time().'-'.$replacepdf_space;
            $destinationpdf=public_path('fileebook');
            $request->file('edit_pdf')->move($destinationpdf,$finalpdfname);
            
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
                    'tanggal_terbit'=>$request->edit_tgl,
                    'isbn'=>$request->edit_isbn,
                    'penerbit'=>$request->edit_penerbit,
                    'deskripsi'=>$request->edit_deskripsi,
                    'id_kategori'=>$request->edit_kategori,
                    'gambar'=>$finalname,
                    'ebook'=>$finalpdfname,
                    'umum'=>$umum,
                    'link'=>$judul_replace_space,
                    'bahasa'=>$request->edit_bahasa,
                    'halaman'=>$request->edit_halaman,
                ]);
            }else{
                $data = BukuModel::where('id',$request->kode_edit)
                ->update([
                    'judul'=>$request->edit_judul,
                    'tanggal_terbit'=>$request->edit_tgl,
                    'isbn'=>$request->edit_isbn,
                    'penerbit'=>$request->edit_penerbit,
                    'id_kategori'=>$request->edit_kategori,
                    'deskripsi'=>$request->edit_deskripsi,
                    'ebook'=>$finalpdfname,
                    'umum'=>$umum,
                    'link'=>$judul_replace_space,
                    'bahasa'=>$request->edit_bahasa,
                    'halaman'=>$request->edit_halaman,
                ]);
            }
        }else{
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
                    'tanggal_terbit'=>$request->edit_tgl,
                    'isbn'=>$request->edit_isbn,
                    'penerbit'=>$request->edit_penerbit,
                    'deskripsi'=>$request->edit_deskripsi,
                    'id_kategori'=>$request->edit_kategori,
                    'gambar'=>$finalname,
                    'umum'=>$umum,
                    'link'=>$judul_replace_space,
                    'bahasa'=>$request->edit_bahasa,
                    'halaman'=>$request->edit_halaman,
                ]);
            }else{
                $data = BukuModel::where('id',$request->kode_edit)
                ->update([
                    'judul'=>$request->edit_judul,
                    'tanggal_terbit'=>$request->edit_tgl,
                    'isbn'=>$request->edit_isbn,
                    'penerbit'=>$request->edit_penerbit,
                    'id_kategori'=>$request->edit_kategori,
                    'deskripsi'=>$request->edit_deskripsi,
                    'link'=>$judul_replace_space,
                    'umum'=>$umum,
                    'bahasa'=>$request->edit_bahasa,
                    'halaman'=>$request->edit_halaman,
                ]);
            }
        }
        
        
    }

    //=================================================================================
    public function destroy($id)
    {
        //
    }
    //=================================================================================
    public function detailebook($id)
    {
        $data = BukuModel::select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
    	->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
    	->where('buku.id',$id)
        ->first();
        $datapembaca = DB::table('baca')->select(DB::raw('baca.*,anggota.gambar,anggota.nama,anggota.notelp,anggota.status_anggota'))
    	->leftjoin('anggota','anggota.id','=','baca.id_anggota')
    	->where('baca.id_ebook',$id)
        ->orderby('baca.id','desc')
        ->limit(15)
        ->get();
        return view('ebook.show',['data'=>$data,'pembaca'=>$datapembaca]);
    }
}
