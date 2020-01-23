<?php

namespace App\Http\Controllers\Buku;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\models\BukuModel;

class BukuController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $data = BukuModel::paginate(20);
        if($request->ajax()){
            return view('buku/Buku',compact('data'));
        }
        return view('buku/IndexBuku',compact('data'));
    }
    public function store(Request $request)
    {
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
                'penulis'=>$request->input_penulis,
                'gambar'=>$finalname
            ]);
        }else{
            BukuModel::insert([
                'judul'=>$request->input_judul,
                'penulis'=>$request->input_penulis
            ]);
        }
    }
    public function show($id)
    {
      $data = BukuModel::where('id',$id)->get();
      return response()->json($data);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
         if($request->hasFile('edit_foto')){
            File::delete('img/buku/'.$request->edit_fotolama);
            $nameland=$request->file('edit_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img/buku');
            $request->file('edit_foto')->move($destination,$finalname);

            $data = BukuModel::where('id',$id)
            ->update([
                'judul'=>$request->edit_judul,
                'penulis'=>$request->edit_penulis,
                'gambar'=>$finalname
            ]);
        }else{
            $data = BukuModel::where('id',$id)
            ->update([
                'judul'=>$request->edit_judul,
                'penulis'=>$request->edit_penulis
            ]);
        }
    }
    public function destroy($id)
    {
        $data = BukuModel::find($id);
        if($data->gambar !='n'){
            File::delete('img/buku/'.$data->gambar);
        }
        BukuModel::destroy($id);
    }
}
