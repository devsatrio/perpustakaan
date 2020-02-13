<?php
namespace App\Http\Controllers\List_buku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use DB;
use DataTables;
use Auth;

class ListController extends Controller
{
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'IP tidak dikenali';
		return $ipaddress;
	}
	//==================================================================
	function get_client_browser() {
		$browser = '';
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
			$browser = 'Netscape';
		else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
			$browser = 'Firefox';
		else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
			$browser = 'Chrome';
		else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
			$browser = 'Opera';
		else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
			$browser = 'Internet Explorer';
		else
			$browser = 'Other';
		return $browser;
	}
	//==================================================================
	public function index(){
		if(Auth::check()){
			$list =  DB::table('buku')
			->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
			->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
			->where('buku.tipe','Book')
			->orderby('buku.id','desc')
			->paginate(10);
		}else{
			if(Auth::guard('anggota')->check()){
				if(Auth::guard('anggota')->user()->status_anggota=='Umum'){
					$list =  DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Book'],['buku.umum','ya']])
					->orderby('buku.id','desc')
					->paginate(10);
				}else{
					$list =  DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('buku.tipe','Book')
					->orderby('buku.id','desc')
					->paginate(10);
				}
			}else{
				$list =  DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['buku.tipe','Book'],['buku.umum','ya']])
				->orderby('buku.id','desc')
				->paginate(10);
			}
		}
		
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
    public function kategori($id)
    {
		if(Auth::check()){
			$data = DB::table('buku')
			->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
			->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
			->where([['buku.tipe','Book'],['buku.id_kategori',$id]])
			->orderby('buku.id','desc')
			->paginate(12);
		}else{
			if(Auth::guard('anggota')->check()){
				if(Auth::guard('anggota')->user()->status_anggota=='Umum'){
					$data = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Book'],['buku.id_kategori',$id],['buku.umum','ya']])
					->orderby('buku.id','desc')
					->paginate(12);
				}else{
					$data = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Book'],['buku.id_kategori',$id]])
					->orderby('buku.id','desc')
					->paginate(12);
				}
			}else{
				$data = DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['buku.tipe','Book'],['buku.id_kategori',$id],['buku.umum','ya']])
				->orderby('buku.id','desc')
				->paginate(12);
			}
		}
    	
    	$kategori = DB::table('buku')
    	->select(DB::raw('buku.*,kategori_buku.nama as kategori'))
    	->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
    	->where([['buku.tipe','Book'],['buku.id_kategori',$id]])
    	->groupby('buku.id_kategori')
    	->get();
    	$page = 'buku';
    	return view('buku/KategoriBuku',['data'=>$data,'page'=>$page,'kategori'=>$kategori]);    	
    }
    //==================================================================
     public function kategori_ebook($id)
    {
    	
		if(Auth::check()){
			$data = DB::table('buku')
			->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
			->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
			->where([['buku.tipe','Ebook'],['buku.id_kategori',$id]])
			->orderby('buku.id','desc')
			->paginate(12);
		}else{
			if(Auth::guard('anggota')->check()){
				if(Auth::guard('anggota')->user()->status_anggota=='Umum'){
					$data = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Ebook'],['buku.id_kategori',$id],['buku.umum','ya']])
					->orderby('buku.id','desc')
					->paginate(12);
				}else{
					$data = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Ebook'],['buku.id_kategori',$id]])
					->orderby('buku.id','desc')
					->paginate(12);
				}
			}else{
				$data = DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['buku.tipe','Ebook'],['buku.id_kategori',$id],['buku.umum','ya']])
				->orderby('buku.id','desc')
				->paginate(12);
			}
		}
    	$kategori = DB::table('buku')
    	->select(DB::raw('buku.*,kategori_buku.nama as kategori'))
    	->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
    	->where([['buku.tipe','Ebook'],['buku.id_kategori',$id]])
    	->groupby('buku.id_kategori')
    	->get();
    	$page = 'ebook';
    	return view('buku/KategoriEbook',['data'=>$data,'page'=>$page,'kategori'=>$kategori]);    	
    }

	//===================================================================	
	public function ebook(){
		if(Auth::check()){
			$data = DB::table('buku')
			->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
			->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
			->where('buku.tipe','Ebook')
			->orderby('buku.id','desc')
			->paginate(10);
		}else{
			if(Auth::guard('anggota')->check()){
				if(Auth::guard('anggota')->user()->status_anggota=='Umum'){
					$data = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['buku.tipe','Ebook'],['buku.umum','ya']])
					->orderby('buku.id','desc')
					->paginate(10);
				}else{
					$data = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('buku.tipe','Ebook')
					->orderby('buku.id','desc')
					->paginate(10);
				}
			}else{
				$data = DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['buku.tipe','Ebook'],['buku.umum','ya']])
				->orderby('buku.id','desc')
				->paginate(10);
			}
		}
		$kategori = DB::table('kategori_buku')->orderby('id','desc')->get();
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

	//=============================================================================
	public function readebook($detail){
		$is_mobile = 'pc/laptop';

		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		
		if ($iphone || $android || $palmpre || $ipod || $berry == true)
		{
			$is_mobile = 'mobile/smartphone';
		}else{
			$is_mobile = 'pc/laptop';
		}

		$data = DB::table('buku')
		->select(DB::raw('buku.*,kategori_buku.nama as namakategori'))
		->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
		->where([['buku.tipe','Ebook'],['buku.link',$detail]])
		->orderby('buku.id','desc')
		->first();
		$buku = DB::table('buku')->where('buku.link',$detail)->first();
		$newbaca = $data->dibaca + 1;

		DB::table('buku')
		->where('id',$data->id)
		->update([
			'dibaca'=>$newbaca
		]);
		
		DB::table('baca')
		->insert([
			'id_anggota'=>Auth::guard('anggota')->user()->id,
			'tanggal'=>date('Y-m-d H:i:s'),
			'id_ebook'=>$buku->id,
			'browser'=>$this->get_client_browser(),
			'ip'=>$this->get_client_ip(),
			'tipe'=>$is_mobile,
		]);
		return view('buku.Bacaebook',['data'=>$data,'page'=>'eboook']);
	}
	//=============================================================================
	public function cari(Request $request)
	{
		$data = $request->cari;
		if(Auth::check()){
			$hasil = DB::table('buku')
			->select(DB::raw('buku.*,kategori_buku.nama as kategori'))
			->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
			->where('judul','like','%'.$data.'%')
			->orwhere('penulis','like','%'.$data.'%')
			->orwhere('penerbit','like','%'.$data.'%')
			->paginate(6);
		}else{
			if(Auth::guard('anggota')->check()){
				if(Auth::guard('anggota')->user()->status_anggota=='Umum'){
					$hasil = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as kategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where([['judul','like','%'.$data.'%'],['buku.umum','ya']])
					->orwhere([['penulis','like','%'.$data.'%'],['buku.umum','ya']])
					->orwhere([['penerbit','like','%'.$data.'%'],['buku.umum','ya']])
					->paginate(6);
				}else{
					$hasil = DB::table('buku')
					->select(DB::raw('buku.*,kategori_buku.nama as kategori'))
					->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
					->where('judul','like','%'.$data.'%')
					->orwhere('penulis','like','%'.$data.'%')
					->orwhere('penerbit','like','%'.$data.'%')
					->paginate(6);
				}
			}else{
				$hasil = DB::table('buku')
				->select(DB::raw('buku.*,kategori_buku.nama as kategori'))
				->leftjoin('kategori_buku','kategori_buku.id','=','buku.id_kategori')
				->where([['judul','like','%'.$data.'%'],['buku.umum','ya']])
				->orwhere([['penulis','like','%'.$data.'%'],['buku.umum','ya']])
				->orwhere([['penerbit','like','%'.$data.'%'],['buku.umum','ya']])
				->paginate(6);
			}
		}
		
		$page='home';

		return view('buku.Pencarian',['hasil'=>$hasil , 'page'=>$page]);
	}
}

?>