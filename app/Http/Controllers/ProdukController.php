<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    //
    function show(){
        $data['produk'] = Produk::all();
        $data['idproduk'] = Produk::find('id');
        return view('pageadmin.produk', $data);
    }

    function create(Request $req){
        $this->validate($req, [
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
        ]);

        Produk::create([
            'kode_produk' => $req->kode_produk,
            'nama_produk' => $req->nama_produk,
            'kategori' => $req->kategori,
            'harga_produk' => $req->harga_produk,
            'deskripsi_produk' => $req->deskripsi_produk,
            'foto_produk'=> $req->file('foto_produk')->store('foto_produk'),
        ]);

        return redirect('produk');
    }

    function edit($id){
        $data['produk'] = Produk::find($id);

        return view('pageadmin.formproduk', $data);
    }

    function update(request $req){

        if ($req->file('foto_produk')) {
            $produk = Produk::Where('id', $req->id)->first();
            Storage::delete($produk->foto_produk);

            $file = $req->file('foto_produk')->store('foto_produk');
        
        }else {
            $file = DB::raw('foto_produk');
        }

        Produk::Where('id', $req->id)->update([
            'kode_produk' => $req->kode_produk,
            'nama_produk' => $req->nama_produk,
            'kategori' => $req->kategori,
            'harga_produk' => $req->harga_produk,
            'deskripsi_produk' => $req->deskripsi_produk,
            'foto_produk' => $file,
        ]);
        return redirect('produk');
    }

    function delete($id){
        $produk = Produk::where('id', $id)->first();
        $produk->delete();
        Storage::delete($produk->foto_produk);

        return Redirect::to('produk')->withSuccess('Success message');
    }
}
