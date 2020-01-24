<?php

namespace App\Http\Controllers\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\models\AnggotaModel;
use Illuminate\Support\Facades\File;
use DataTables;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //=================================================================================
    public function json(){
        return Datatables::of(AnggotaModel::all())->make(true);
    }

    //=================================================================================
    public function index()
    {
        return view('anggota.index');
    }

    //=================================================================================
    public function store(Request $request)
    {
        if($request->hasFile('input_foto')){
            $nameland=$request->file('input_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img/anggota');
            $request->file('input_foto')->move($destination,$finalname);
                AnggotaModel::create([
                    'nama'=>$request->input_nama,
                    'password'=>Hash::make($request->input_pass),
                    'username'=>$request->input_user,
                    'alamat'=>$request->input_alamat,
                    'notelp'=>$request->input_notelp,
                    'gambar'=>$finalname
                ]);
            }else{
                AnggotaModel::create([
                    'nama'=>$request->input_nama,
                    'password'=>Hash::make($request->input_pass),
                    'username'=>$request->input_user,
                    'alamat'=>$request->input_alamat,
                    'notelp'=>$request->input_notelp,
                ]);
            }
    }
    //=================================================================================
    public function show($id)
    {
        $data = AnggotaModel::where('id',$id)->get();
        return response()->json($data);
    }
    
    //=================================================================================
    public function update(Request $request, $id)
    {
        if($request->hasFile('edit_foto')){
            if($request->edit_fotolama!='n'){
                File::delete('img/anggota/'.$request->edit_fotolama);
            }
            
            $nameland=$request->file('edit_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img/anggota');
            $request->file('edit_foto')->move($destination,$finalname);

            if($request->edit_password==''){
                $data = AnggotaModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'nama'=>$request->edit_nama,
                    'alamat'=>$request->edit_alamat,
                    'notelp'=>$request->edit_notelp,
                    'gambar'=>$finalname
                ]);
            }else{
                $data = AnggotaModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'nama'=>$request->edit_nama,
                    'alamat'=>$request->edit_alamat,
                    'notelp'=>$request->edit_notelp,
                    'password'=>Hash::make($request->edit_password),
                    'gambar'=>$finalname
                ]);
            }
            
        }else{
            if($request->edit_password==''){
                $data = AnggotaModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'nama'=>$request->edit_nama,
                    'alamat'=>$request->edit_alamat,
                    'notelp'=>$request->edit_notelp
                ]);
            }else{
                $data = AnggotaModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'nama'=>$request->edit_nama,
                    'notelp'=>$request->edit_notelp,
                    'alamat'=>$request->edit_alamat,
                    'password'=>Hash::make($request->edit_password)
                ]);
            }
        }
    }

    //=================================================================================
    public function destroy($id)
    {
        $data = AnggotaModel::find($id);
        if($data->gambar !='n'){
            File::delete('img/anggota/'.$data->gambar);
        }
        AnggotaModel::destroy($id);  
    }
}
