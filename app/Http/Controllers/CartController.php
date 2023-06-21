<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    function show(){
        $data['carts'] = Cart::all()->count();
        $data['cart'] = DB::table('carts')
                        ->join('produks', 'produks.kode_produk', '=', 'carts.kode_produk')
                        ->get();

        // $subtotal = 0;
        // $harga = Cart::all()->count();

        // $data['harga'] = Cart::select('jumlah_harga');

        // for ($i=0; $i < $harga; $i++) { 
        //     $subtotal=$harga[$i]+$subtotal;
        // }

        // return $total;

        // $data['pesanan'] = DB::table('pesanans')->select('total')->get();
        
        return view('cart', $data);
    }

    function delete($id){
        $data = Cart::where('id', $id)->first();
        $data->delete();

        return redirect('cart');
    }
}
