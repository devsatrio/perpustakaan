<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\UserModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DataTables; 

class UserController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    public function json(){
        return Datatables::of(UserModel::all())->make(true);
    }

    //=================================================================================
    public function index(Request $request)
    {
        return view('user/IndexUser');
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
            $destination=public_path('img');
            $request->file('input_foto')->move($destination,$finalname);

            UserModel::create([
            'name'=>$request->input_nama,
            'email'=>$request->input_email,
            'password'=>Hash::make($request->input_pass),
            'username'=>$request->input_user,
            'alamat'=>$request->input_alamat,
            'notelp'=>$request->input_notelp,
            'foto'=>$finalname,
            'level'=>$request->input_level,
            ]);
            }else{
                UserModel::create([
            'name'=>$request->input_nama,
            'email'=>$request->input_email,
            'password'=>Hash::make($request->input_pass),
            'username'=>$request->input_user,
            'alamat'=>$request->input_alamat,
            'notelp'=>$request->input_notelp,
            'level'=>$request->input_level,
            ]);
            }
        
    }

    //=================================================================================
    public function show($id)
    {
        $data = UserModel::where('id',$id)->get();
        return response()->json($data);
    }

    //=================================================================================
    public function update(Request $request, $id)
    {

        if($request->hasFile('edit_foto')){
            if($request->edit_fotolama!='n'){
                File::delete('img/'.$request->edit_fotolama);
            }
            
            $nameland=$request->file('edit_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img');
            $request->file('edit_foto')->move($destination,$finalname);

            if($request->edit_password==''){
                $data = UserModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'name'=>$request->edit_nama,
                    'email'=>$request->edit_email,
                    'alamat'=>$request->edit_alamat,
                    'notelp'=>$request->edit_notelp,
                    'level'=>$request->edit_level,
                    'foto'=>$finalname
                ]);
            }else{
                $data = UserModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'name'=>$request->edit_nama,
                    'email'=>$request->edit_email,
                    'alamat'=>$request->edit_alamat,
                    'notelp'=>$request->edit_notelp,
                    'password'=>Hash::make($request->edit_password),
                    'level'=>$request->edit_level,
                    'foto'=>$finalname
                ]);
            }
            
        }else{
            if($request->edit_password==''){
                $data = UserModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'name'=>$request->edit_nama,
                    'email'=>$request->edit_email,
                    'alamat'=>$request->edit_alamat,
                    'level'=>$request->edit_level,
                    'notelp'=>$request->edit_notelp
                ]);
            }else{
                $data = UserModel::where('id',$request->kode_edit)
                ->update([
                    'username'=>$request->edit_username,
                    'name'=>$request->edit_nama,
                    'email'=>$request->edit_email,
                    'alamat'=>$request->edit_alamat,
                    'notelp'=>$request->edit_notelp,
                    'level'=>$request->edit_level,
                    'password'=>Hash::make($request->edit_password)
                ]);
            }
        }
        
    }

    //=================================================================================
    public function destroy($id)
    {
        $data = UserModel::find($id);
        if($data->foto !='n'){
            File::delete('img/'.$data->foto);
        }
        UserModel::destroy($id);  
    }
}
