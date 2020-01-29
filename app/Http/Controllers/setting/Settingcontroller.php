<?php

namespace App\Http\Controllers\setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use DB;

class Settingcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=================================================================================
    
    public function index(Request $request){
        $setting = DB::table('setting')->orderby('id','desc')->first();
        return view('setting.index',['setting'=>$setting]);
    }
    //================================================================================= 
    public function update(Request $request){
        if($request->hasFile('input_foto')){
            File::delete('img/setting/'.$request->foto_lama);
            $nameland=$request->file('input_foto')->
            getClientOriginalname();
            $lower_file_name=strtolower($nameland);
            $replace_space=str_replace(' ', '-', $lower_file_name);
            $finalname=time().'-'.$replace_space;
            $destination=public_path('img/setting');
            $request->file('input_foto')->move($destination,$finalname);

        DB::table('setting')
        ->where('id',$request->kode)
        ->update([
            'landing_text'=>$request->landing,
            'sublanding_text'=>$request->sublanding,
            'denda'=>$request->denda,
            'gambar'=>$finalname,
        ]);
        }else{
        DB::table('setting')
        ->where('id',$request->kode)
        ->update([
            'landing_text'=>$request->landing,
            'sublanding_text'=>$request->sublanding,
            'denda'=>$request->denda,
        ]);
        }
        return back()->with('status','Setting Berhasil Di perbarui');
    }
}
