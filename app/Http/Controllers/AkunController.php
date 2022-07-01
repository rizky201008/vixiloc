<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index(){
        return view('account.index',[
            'title'=>'Akun Anda'
        ]);
    }
    public function deposit(){
        return view('account.deposit',[
            'title'=>'Deposit'
        ]);
    }
}
