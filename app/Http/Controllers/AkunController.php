<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all()->where('user_id','=',Auth::user()->id);
        return view('account.index',[
            'title'=>'Akun Anda',
            'pesanan'=>$pesanan
        ]);
    }
    public function deposit(){
        return view('account.deposit',[
            'title'=>'Deposit'
        ]);
    }
}
