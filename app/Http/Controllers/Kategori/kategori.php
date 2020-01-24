<?php
namespace App\Http\Controllers\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\kategoriModel;
use Illuminate\Support\Facades\File;
use DataTables;

class kategori extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    public function json(){
        return Datatables::of(kategoriModel::all())->make(true);
    }
    //=================================================================
    public function index()
    {
        return view('kategori.index');
    }

    //=================================================================
    public function store(Request $request)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input_nama)));
        if($request->input_aksi=='tambah'){
            kategoriModel::create([
                'nama'=>$request->input_nama,
                'slug'=>$slug
            ]);
        }else{
            kategoriModel::where('id',$request->input_kode)
                ->update([
                    'nama'=>$request->input_nama,
                    'slug'=>$slug
                ]);
        }
    }
    //=================================================================================
    public function show($id)
    {
        $data = kategoriModel::where('id',$id)->get();
        return response()->json($data);
    }
    //=================================================================
    public function destroy($id)
    {
        kategoriModel::destroy($id);
    }
}
