<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //========================================================
    public function index()
    {
        $jumlah_buku = DB::table('buku')->where('tipe','Book')->count();
        $jumlah_ebook = DB::table('buku')->where('tipe','Ebook')->count();
        $jumlah_anggota = DB::table('anggota')->count();
        return view('home',['jumlah_buku'=>$jumlah_buku,'jumlah_ebook'=>$jumlah_ebook,'jumlah_anggota'=>$jumlah_anggota]);
    }
}
