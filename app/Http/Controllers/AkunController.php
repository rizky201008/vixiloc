<?php

namespace App\Http\Controllers;

use Telegram\Bot\Api;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all()->where('user_id', '=', Auth::user()->id);
        return view('account.index', [
            'title' => 'Akun Anda',
            'pesanan' => $pesanan
        ]);
    }
    public function deposit()
    {
        return view('account.deposit', [
            'title' => 'Deposit'
        ]);
    }
    public function confirm()
    {
        return view('account.dconfirm', [
            'title' => 'Konfirmasi'
        ]);
    }
    public function confirmDeposit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'norek' => 'required',
            'nominal' => 'required',
            'bank' => 'required'
        ]);
        $nama = $validated['nama'];
        $norek = $validated['norek'];
        $nominal = number_format($validated['nominal'], '0',',','.');
        $bank = $validated['bank'];
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_ADMIN_CHAT_ID'),
            'text' => 
            "Deposit masuk dari
            Nama : $nama
            Norek : $norek
            Nominal : Rp. $nominal
            Ke bank: $bank"
        ]);
        return back()->with('success', "Silahkan tunggu maks 1 jam jika belum masuk silahkan hubungi admin");
    }
}
