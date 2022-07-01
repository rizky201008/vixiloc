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
        $kategori = Category::all();
        return view('dashboard', [
            'title' => 'Dashboard',
            'kategori' => $kategori
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
        if (Auth::user()->saldo>$harga) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.serpul.co.id/prabayar/order',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => "destination=$request->destinasi&product_id=$request->sku&ref_id=$request->ref",
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Authorization: a01d44c5b1b919ff410c580efca099ce'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $json_result = json_decode($response, true);

            $response_code= $json_result['responseCode'];
            $response_message= $json_result['responseMessage'];

            if ($response_code == 200) {
                // echo '<script>alert("'.$response_message.'");</script>';
                return back()->with('success', "$response_message");
            } elseif ($response_code == 400) {
                return back()->with('error', "$response_message");
            }
        } else {
            echo '<script>alert("O Uh saldo anda kurang!!");</script>';
        }
    }
}
