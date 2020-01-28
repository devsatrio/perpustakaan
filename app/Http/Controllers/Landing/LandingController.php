<?php 
namespace App\Http\Controllers\landing;
ini_set('max_execution_time', 180);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;


class LandingController extends Controller
{

	public function index(){
		$users = DB::table('users')->get();
		$data = DB::table('anggota')->get();
		$page = 'home';
	return view('landing/IndexLanding',['user'=>$users,'anggota'=>$data,'page'=>$page]);
	}

}
