<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produks";
    protected $primaryKey = "id";
    protected $guarded = "";

    function cart(){
        $this->hasMany(Cart::class, 'kode_produk');
    }
}
