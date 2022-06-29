<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

        if ($json_result['responseCode']==200) {
            echo $json_result['responseMessage'];
            return redirect('/');
        }elseif ($json_result['responseCode'] == 400) {
            echo $json_result['responseMessage'];
        }
    }
}
