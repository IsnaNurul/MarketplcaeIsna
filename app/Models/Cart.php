<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $primaryKey = "id";
    protected $guarded = "";

    function produk(){
        $this->belongsTo(Produk::class, 'kode_produk');
    }

    public function total()
{
        return $this->carts->sum('harga_produk');
}
}
