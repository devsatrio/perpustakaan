<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\UserModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $data = UserModel::paginate(20);
  
        if ($request->ajax()) {
            return view('user/user', compact('data'));
        }
        return view('user/IndexUser',compact('data'));
    }

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
            'foto'=>$finalname
            ]);
            }else{
                UserModel::create([
            'name'=>$request->input_nama,
            'email'=>$request->input_email,
            'password'=>Hash::make($request->input_pass),
            'username'=>$request->input_user,
            'alamat'=>$request->input_alamat,
            'notelp'=>$request->input_notelp
            ]);
            }
        
    }
    public function show($id)
    {
        $data = UserModel::where('id',$id)->get();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {

        if($request->hasFile('edit_foto')){
            File::delete('img/'.$request->edit_fotolama);
            $nameland=$request->file('edit_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img');
            $request->file('edit_foto')->move($destination,$finalname);

            $data = UserModel::where('id',$id)
            ->update([
                'username'=>$request->edit_username,
                'name'=>$request->edit_nama,
                'email'=>$request->edit_email,
                'alamat'=>$request->edit_alamat,
                'notelp'=>$request->edit_notelp,
                'foto'=>$finalname
            ]);
        }else{
            $data = UserModel::where('id',$id)
            ->update([
                'username'=>$request->edit_username,
                'name'=>$request->edit_nama,
                'email'=>$request->edit_email,
                'alamat'=>$request->edit_alamat,
                'notelp'=>$request->edit_notelp
            ]);
        }
        
    }
    public function destroy($id)
    {
        $data = UserModel::find($id);
        if($data->foto !='n'){
            File::delete('img/'.$data->foto);
        }
        UserModel::destroy($id);  
    }
}
