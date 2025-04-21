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
        Schema::create('pesanan', function(Blueprint $table){
            $table->id();
            $table->foreignId('id_users')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('id_produk')->constrained('produk')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->enum('status_pesanan', ['unpaid', 'progress', 'sent', 'done']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
