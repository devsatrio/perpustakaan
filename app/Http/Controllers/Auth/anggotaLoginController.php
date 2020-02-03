<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class anggotaLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $guard = 'anggota';

    protected $redirectTo = '/';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:anggota')->except('logout');
    }
    
    public function showLoginForm()
    {
        return view('auth.anggotalogin');
    }
    
    protected function credentials(Request $request){
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL) ? $this->username():'username';
        return[
            $field =>$request->get($this->username()),
            'password' => $request->password,
        ];
    }
    public function login(Request $request)

    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
          ]);
          // Attempt to log the user in
          if (Auth::guard('anggota')->attempt(['username' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect('/');
          }
          // if unsuccessful, then redirect back to the login with the form data
          return redirect()->back()->with('status','Maaf, Username atau Password Salah');
     }

    public function logout()
    {
        Auth::guard('anggota')->logout();
        return redirect('/');
    }
}
