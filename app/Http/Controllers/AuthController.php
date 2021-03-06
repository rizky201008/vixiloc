<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login',[
            'title' => 'Login'
        ]);
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('error', 'Gagal Login!!!');
    }
    public function register(){
        return view('auth.register',[
            'title' => 'Daftar'
        ]);
    }

    public function store(Request $request){
        $validated_data=$request->validate([
            'email'=>'required|email:dns|unique:users|max:225',
            'name'=>'required|max:225',
            'password'=>'required|min:8',
        ]);
        //Enkripsi sandi
        $password = bcrypt($validated_data['password']);
        $api_key = md5($validated_data['email'].$password);
        //Simpan data
        User::create([
            'email'=>$validated_data['email'],
            'name'=>$validated_data['name'],
            'password'=>$password,
            'api_key'=>$api_key
        ]);
        
        // Beritahu Admin jika ada user baru daftar
        $email = $validated_data['email'];
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_ADMIN_CHAT_ID'),
            'text' => "Kabar baik user $email baru saja mendaftar di vixiloc.my.id"
        ]);

        //Kembalikan ke login-page jika berhasil
        return redirect('/auth/login')->with('success','Selamat anda sudah terdaftar');
    }
    
    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
