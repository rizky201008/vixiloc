<?php

namespace App\Http\Controllers;

use App\Models\User;
use Telegram\Bot\Api;
use App\Models\Pesanan;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $game = Category::all()->where('tipe', '=', 'game');
        $voucher = Category::all()->where('tipe', '=', 'voucher');
        return view('home', [
            'title' => 'Home',
            'game' => $game,
            'voucher' => $voucher
        ]);
    }
    public function category($slug)
    {
        $kategori = Category::with('product')->where('slug', '=', $slug)->first();
        return view('product', [
            'title' => 'Produk',
            'category' => $kategori
        ]);
    }
    public function tx(Request $request)
    {
        $produk = Product::where('sku', '=', $request->sku)->first();
        $harga = $produk['price'];
        $destination = $request->destinasi;
        $ref_id = $request->ref;
        $sku = $produk['sku'];
        $saldo = Auth::user()->saldo;
        $email = Auth::user()->email;
        if (Auth::user()->saldo > $harga) {
            // digiflazz.com
            $digi_link = 'https://api.digiflazz.com/v1/transaction';
            $digi_api = env('DIGIFLAZZ_API');
            $digi_user = env('DIGIFLAZZ_USERNAME');

            $sign = md5($digi_user . $digi_api . $ref_id);

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

            $response_status = $json_result['data']['status'];
            $response_message = $json_result['data']['message'];

            if ($response_status == 'Sukses') {
                $pesanan = new Pesanan;
                $pesanan->product_name = $produk->name;
                $pesanan->ref = $ref_id;
                $pesanan->price = $harga;
                $pesanan->user_id = Auth::user()->id;
                $pesanan->save();
                User::where('id', Auth::user()->id)->update(['saldo' => $saldo - $harga]);
                $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
                $telegram->sendMessage([
                    'chat_id' => env('TELEGRAM_ADMIN_CHAT_ID'),
                    'text' => "Transaksi user $email berhasil"
                ]);
                return back()->with('success', "$response_message");
            } elseif ($response_status == 'Pending') {
                $pesanan = new Pesanan;
                $pesanan->product_name = $produk->name;
                $pesanan->ref = $ref_id;
                $pesanan->price = $harga;
                $pesanan->user_id = Auth::user()->id;
                $pesanan->save();
                User::where('id', Auth::user()->id)->update(['saldo' => $saldo - $harga]);
                $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
                $telegram->sendMessage([
                    'chat_id' => env('TELEGRAM_ADMIN_CHAT_ID'),
                    'text' => "Transaksi user $email pending"
                ]);
                return back()->with('success', "$response_message");
            } elseif ($response_status == 'Gagal') {
                $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
                $telegram->sendMessage([
                    'chat_id' => env('TELEGRAM_ADMIN_CHAT_ID'),
                    'text' => "Transaksi user $email gagal dengan pesan : $response_message"
                ]);
                return back()->with('error', "$response_message");
            }
        } else {
            return back()->with('saldo', "Saldo anda kurang silahkan deposit");
        }
    }

    public function help()
    {
        return view('help', [
            'title' => 'Help'
        ]);
    }
}
