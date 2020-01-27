<?php

namespace App\Http\Controllers\Denda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class dendacontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    public function index()
    {
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,anggota.nama,buku.judul'))
        ->leftJoin('anggota','anggota.id','=','pinjam.id_anggota')
        ->leftJoin('buku','buku.id','=','pinjam.id_buku')
        ->whereNotNull('pinjam.denda')
        ->orderby('pinjam.id','desc')
        ->get();
        return view('denda.index',['data'=>$data]);
    }

    //=================================================================================
    public function cari(Request $request)
    {
        $data = DB::table('pinjam')
        ->select(DB::raw('pinjam.*,anggota.nama,buku.judul'))
        ->leftJoin('anggota','anggota.id','=','pinjam.id_anggota')
        ->leftJoin('buku','buku.id','=','pinjam.id_buku')
        ->whereNotNull('pinjam.denda')
        ->whereBetween('pinjam.tgl_kembali', [$request->tgl_satu, $request->tgl_dua])
        ->orderby('pinjam.id','desc')
        ->get();
        return view('denda.cari',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
