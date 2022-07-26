<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $products = Product::where('category_id', '=', "$category")->get();
        $data['data'] = $products;
        return response()->json(['message'=>'success','data'=>$data]);
    }
    public function user(){
        $user['response'] = User::all();
        return response()->json(['message' => 'success', 'data' => $user]);
    }
    public function category()
    {
        $categories = Category::all();
        $data['data'] = $categories;
        return response()->json(['message' => 'success', 'data' => $data]);
    }
    public function transfer(Request $request, $id){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $update_data = $request->validate([
            'saldo' => 'required'
        ]);
        if ($credentials['email']=='admin@vixiloc.my.id'){
            if (Auth::attempt($credentials)){
                $user = User::find($id)->first();
                $user->saldo=$user['saldo']+$update_data['saldo'];
                $user->save();
                $response['response']=[
                    'id'=>$user['id'],
                    'email'=>$user['email'],
                    'saldo'=>$user['saldo']
                ];
                return response()->json(['message' => 'success', 'data' => $response]);
            }
            else {
                return response()->json(['message'=>'failed','data'=>'']);
            }
        }
    }
    public function route_cache(){
            Artisan::call('route:cache');
            return response()->json('Route Cache Clear');
    }
}