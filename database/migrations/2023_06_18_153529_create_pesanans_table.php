<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_trans', 50);
            $table->bigInteger('id_cart')->unsigned();
            $table->foreign('id_cart')->references('id')->on('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_produk', 10);
            $table->foreign('kode_produk')->references('kode_produk')->on('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 50);
            $table->text('address');
            $table->string('payment', 50);
            $table->string('name_card', 50)->NULL();
            $table->string('number_card', 50)->NULL();
            $table->date('tanggal');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
