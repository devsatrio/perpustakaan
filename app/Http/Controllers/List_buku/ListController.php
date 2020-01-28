<?php
namespace App\Http\Controllers\List_buku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use DB;
use DataTables;

class ListController extends Controller
{
	public function index(){
		$list =  DB::table('buku')
		->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
		->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
		->where('buku.tipe','Book')
		->orderby('buku.id','desc')
		->paginate(10);
		$page = 'buku';
		$kategori = DB::table('kategori_buku')->orderby('id','desc')->get();
		return view('buku/ListBuku',['list'=>$list,'page'=>$page,'kategori'=>$kategori]);
	}
	//==================================================================
	public function detail($link)
    {
   	$view = DB::table('buku')
		->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
		->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
		->where([['buku.tipe','Book'],['buku.link',$link]])
		->orderby('buku.id','desc')
		->first();
	$datalain = DB::table('buku')
		->where('buku.tipe','Book')
		->inRandomOrder()
		->inRandomOrder()
		->get();
   	$page = 'detail';
    return view('buku/DetailBuku',['view'=>$view,'page'=>$page,'datalain'=>$datalain]);
    }

	//===================================================================	
	public function ebook(){
		$kategori = DB::table('kategori_buku')->orderby('id','desc')->get();
		$data = DB::table('buku')
		->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
		->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
		->where('buku.tipe','Ebook')
		->orderby('buku.id','desc')
		->paginate(10);
		$page = 'ebook';
		return view('buku.ListEbook',['data'=>$data,'kategori'=>$kategori,'page'=>$page]);
	}
	
	//========================================================================
	public function showebook($detail){
		$data = DB::table('buku')
		->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
		->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
		->where([['buku.tipe','Ebook'],['buku.link',$detail]])
		->orderby('buku.id','desc')
		->first();
		$datalain = DB::table('buku')
		->where('buku.tipe','Ebook')
		->inRandomOrder()
		->inRandomOrder()
		->get();
		$page = 'ebook';
		return view('buku.Detailebook',['datalain'=>$datalain,'data'=>$data,'page'=>$page]);
	}
}

?>
