<?php
namespace App\Http\Controllers\List_buku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DataTables;

class ListController extends Controller
{
	public function index(){
		
		$list =  DB::table('buku')->where('tipe','=','Book')->paginate(8);
		$page = 'buku';
		return view('buku/ListBuku',['list'=>$list,'page'=>$page]);
	}	
}

?>
