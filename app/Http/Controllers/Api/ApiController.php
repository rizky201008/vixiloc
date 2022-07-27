<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class ApiController extends Controller
{
    public function index()
    {
        $data['data'] = ['message' => 'Hai! ini adalah ucapan selamat datang dari kami'];
        return response()->json($data);
    }
    public function product($category)
    {
        $products = Product::where('category_id', '=', "$category")->first();
        $data['data'] = $products;
        return response()->json(['message'=>'success','data'=>$data]);
    }
    public function category()
    {
        $categories = Category::all();
        $data['data'] = $categories;
        return response()->json(['message' => 'success', 'data' => $data]);
    }
    public function transfer(Request $request){
        $update_data = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'amount' => 'required',
            'api_key' => 'required'
        ]);
        $sender = DB::table('users')->where('email','=',$update_data['from'])->first();
        $user = DB::table('users')->where('email', '=', $update_data['to'])->first();        
        $saldo_pengirim = $sender->saldo;
        $saldo_penerima = $user->saldo;
        $req_api = $update_data['api_key'];
        $api_key = $sender->api_key;
        $jumlah_transfer = $update_data['amount'];
        $kurangi_saldo = $saldo_pengirim-$jumlah_transfer;
        $tambah_saldo = $saldo_penerima+$jumlah_transfer;
        if ($req_api==$api_key) {
            if ($saldo_pengirim>=$jumlah_transfer) {
                DB::table('users')->where('email', '=', $update_data['from'])->update(['saldo'=>$kurangi_saldo]);
                DB::table('users')->where('email', '=', $update_data['to'])->update(['saldo' => $tambah_saldo]);
                return response()->json(['message' => 'Berhasil transfer saldo anda telah di kirim']);
            } else {
                return response()->json(['message'=>'Gagal transfer uang anda tidak cukup']);
            }
        }else {
            return response()->json(['message'=>'API key anda salah silahkan cek ulang dan ulangi request']);
        }
    }
    public function route_cache(){
            Artisan::call('route:cache');
            return response()->json('Route Cache Clear');
    }
    public function transaction(){
        return response()->json(['message'=>'Hai, Fitur ini masih dalam pengembangan']);
    }
}