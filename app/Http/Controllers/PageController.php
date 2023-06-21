<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Pesanan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    function show(){
        $data['produk'] = Produk::all();
        $data['cart'] = Cart::all()->count();
        return view('pageutama', $data);
    }

    function showsepatu(){
        $data['produk'] = Produk::where('kategori', 'sepatu')->get();
        $data['cart'] = Cart::all()->count();
        return view('sepatu', $data);
    }

    function showbaju(){
        $data['produk'] = Produk::where('kategori', 'baju')->get();
        $data['cart'] = Cart::all()->count();
        return view('baju', $data);
    }

    function showtas(){
        $data['produk'] = Produk::where('kategori', 'tas');
        $data['cart'] = Cart::all()->count();
        return view('tas', $data);
    }

    function showid($id){
        $data['produk'] = Produk::find($id);
        $data['cart'] = Cart::all()->count();

        return view('pagedetail', $data);
    }

    function create(Request $req, $kode){
        $tanggal = Carbon::now();
        $produk = Produk::where('kode_produk', $kode)->first();
        // $pesanan = Pesanan::where('id', '1')->first();

        Cart::updateOrCreate(
            ['kode_produk' => $kode],
            ['kode_produk' => $kode, 'jumlah' => $req->jumlah, 'jumlah_harga'=> $produk->harga_produk*$req->jumlah],
        );
        
        // Pesanan::updateOrCreate(
        //     ['id' => '1'],
        //     ['id' => '1', 'tanggal' => $tanggal, 'total'=> $pesanan->total + $produk->harga_produk*$req->jumlah],
        // );

        return redirect('cart');
    }
}
