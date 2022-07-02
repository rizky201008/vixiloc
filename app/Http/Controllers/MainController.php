<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $game = Category::all()->where('tipe','=','game');
        return view('home', [
            'title' => 'Home',
            'game' => $game
        ]);
    }
    public function category($slug)
    {
        $kategori = Category::with('product')->where('slug','=',$slug)->first();
        return view('product', [
            'title' => 'Produk',
            'category' => $kategori
        ]);
    }
    // public function store(Request $request)
    // {
    //     $data = $request->except(['_token']);
    //     M_Mahasiswa::insert($data);
    //     return redirect('/');
    // }
    public function tx(Request $request){
        $produk= Product::where('sku','=',$request->sku)->first();
        $harga=$produk['price'];
        $destination=$request->destinasi;
        $ref_id = $request->ref;
        $sku=$produk['sku'];
        if (Auth::user()->saldo>$harga) {
            $digi_link= 'https://api.digiflazz.com/v1/transaction';
            $digi_api= '74dde90d-c848-5da8-b45f-770920d94328';
            $digi_user= 'yesavag9vZNo';

            $sign = md5($digi_user.$digi_api.$ref_id);

            $api_postdata = array(
                'username' => "$digi_user",
                'buyer_sku_code' => "$sku",
                'customer_no' => "$destination",
                'ref_id' => "$ref_id",
                'sign' => "$sign"
            );
            $header = array(
                'Content-Type: application/json',
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $digi_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($api_postdata));
            $chresult = curl_exec($ch);
            curl_close($ch);
            $json_result = json_decode($chresult, true);
            // $result = json_decode($chresult);

            $response_status= $json_result['data']['status'];
            $response_message= $json_result['data']['message'];

            if ($response_status == 'Sukses') {
                // echo '<script>alert("'.$response_message.'");</script>';
                return back()->with('success', "$response_message");
            } elseif ($response_status == 'Gagal') {
                return back()->with('error', "$response_message");
            }
        } else {
            return back()->with('saldo', "Saldo anda kurang silahkan deposit");
        }
    }

    public function help(){
        return view('help',[
            'title' => 'Help'
        ]);
    }
}
