<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartDetailController extends Controller
{
    //
    function show(){
        // $data['carts'] = Cart::find($id);
        $data['carts'] = Cart::all()->count();

        $data['cart'] = DB::table('carts')
            ->join('produks', 'produks.kode_produk', '=', 'carts.kode_produk')
            ->select('carts.*', 'produks.*')
            ->get();

        // $data['cart'] = DB::table('carts')
        // ->join('produks', 'produks.kode_produk', '=', 'carts.kode_produk')
        // ->where('carts.id', '=', $id)
        // ->get();

        return view('checkout', $data);
    }

    function showpesanan(){
        $data['pesanan'] = Pesanan::all();

        return view('pageadmin.transaksi', $data);
    }

    function create(Request $req, $id, $total){
        $tanggal = Carbon::now();
        $cart = Cart::all();
        $pesanan = Pesanan::all();
        $count_cart = Cart::all()->count();

        //  foreach ($cart as $key => $value) {

        //     foreach ($pesanan as $key => $value1) {
        //         if (empty($value1->id_cart)) {
        //             $produk = Cart::where('id_cart', $value->id)->delete();
        //         }
        //     }

        //     Pesanan::create([
        //         'kode_trans' => $id,
        //         'id_cart' => $value->id,
        //         'kode_produk' => $value->kode_produk,
        //         'first_name' => $req->first_name,
        //         'last_name' => $req->last_name,
        //         'email' => $req->email,
        //         'address' => $req->address,
        //         'payment' => $req->payment,
        //         'name_card' => $req->name_card,
        //         'number_card' => $req->number_card,
        //         'tanggal' => $tanggal,
        //         'total' => $total
        //     ]);

        // }

        foreach ($cart as $key => $value) {
            Pesanan::create([
                // 'kode_trans' => $id,
                // 'kode_produk' => $value->id,
                // 'first_name' => $req->first_name,
                // 'last_name' => $req->last_name,
                // 'email' => $req->email,
                // 'address' => $req->address,
                // 'payment' => $req->payment,
                // 'name_card' => $req->name_card,
                // 'number_card' => $req->number_card,
                // 'tanggal' => $tanggal,
                // 'total' => $total

                'kode_trans' => $id,
                'id_cart' => $value->id,
                'kode_produk' => $value->kode_produk,
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'email' => $req->email,
                'address' => $req->address,
                'payment' => $req->payment,
                'name_card' => $req->name_card,
                'number_card' => $req->number_card,
                'tanggal' => $tanggal,
                'total' => $total
            ]);

        }
        
            

        // return Redirect::to('https://wa.me/62882001207018?text='.$total.'+NAMA:'.$req->first_name);
        return Redirect::to('https://wa.me/62882001207018?text=Hai admin, Saya telah membeli sebuah produk dengan KODE TRANSAKSI :'.$id.', Atas Nama :'.$req->first_name.' '.$req->last_name.' Email : '.$req->email.' Total Bayar : '.$total.' Dengan Payment : '.$req->payment);


        // return redirect('page');
        
    }
}
