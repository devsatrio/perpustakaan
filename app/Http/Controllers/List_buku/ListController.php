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
		$list =  DB::table('buku')->where('tipe','=','Book')->paginate(8);
		$page = 'buku';
		return view('buku/ListBuku',['list'=>$list,'page'=>$page]);
	}

	//===================================================================	
	public function ebook(){
		$data = DB::table('buku')
		->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
		->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
		->where('buku.tipe','Ebook')
		->orderby('buku.id','desc')
		->paginate(10);
		$page = 'ebook';
		return view('buku.ListEbook',['data'=>$data,'page'=>$page]);
	}
}

?>
