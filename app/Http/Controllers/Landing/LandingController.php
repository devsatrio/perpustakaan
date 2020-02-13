<?php 
namespace App\Http\Controllers\landing;
ini_set('max_execution_time', 180);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Auth;


class LandingController extends Controller
{

	public function index(){
		if(Auth::check()){
			$list = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('buku.tipe','Book')
					->orderby('buku.id','desc')
					->paginate(9);
	
					$list_ebook = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('buku.tipe','Ebook')
					->orderby('buku.id','desc')
					->paginate(9);
		}else{
			if(Auth::guard('anggota')->check()){
				if(Auth::guard('anggota')->user()->status_anggota=='Umum'){
					$list = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Book'],['buku.umum','ya']])
					->orderby('buku.id','desc')
					->paginate(9);
	
					$list_ebook = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Ebook'],['buku.umum','ya']])
					->orderby('buku.id','desc')
					->paginate(9);
				}else{
					$list = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('buku.tipe','Book')
					->orderby('buku.id','desc')
					->paginate(9);
	
					$list_ebook = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('buku.tipe','Ebook')
					->orderby('buku.id','desc')
					->paginate(9);
				}
			}else{
				$list = DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['buku.tipe','Book'],['buku.umum','ya']])
				->orderby('buku.id','desc')
				->paginate(9);
	
				$list_ebook = DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['buku.tipe','Ebook'],['buku.umum','ya']])
				->orderby('buku.id','desc')
				->paginate(9);
			}
		}
		$count1 =DB::table('buku')->where('tipe','=','Book')->count();
		$count2 =DB::table('buku')->where('tipe','=','Ebook')->count();
		$count3 =DB::table('anggota')->count();
		$kategori = DB::table('kategori_buku')->orderby('id','desc')->get();
		$setting = DB::table('setting')->select('*')->get();
		$page = 'home';
	return view('landing/IndexLanding',['list'=>$list,'list_ebook'=>$list_ebook,'kategori'=>$kategori,'page'=>$page,'count'=>$count1,'count2'=>$count2,'count3'=>$count3,'setting'=>$setting]);
	}

}