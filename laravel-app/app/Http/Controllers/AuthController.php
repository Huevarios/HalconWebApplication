<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller 
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $data=$request->validate(['email'=>'required|email','password'=>'required']);
        if(Auth::attempt($data))
        {
            if(!Auth::user()->is_active)
            {
                Auth::logout();
                return back()->withErrors(['email'=>'This account is inactive.']);
            }
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email'=>'Invalid credentials.'])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
