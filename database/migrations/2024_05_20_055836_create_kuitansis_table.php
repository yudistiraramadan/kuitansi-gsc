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
        Schema::create('kuitansis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('donatur');
            $table->bigInteger('nominal');
            $table->string('terbilang');
            $table->string('keperluan');
            $table->enum('jenis_donasi', ['Zakat', 'Tabung Kebaikan', 'Kotak Infaq', 'Wakaf', 'Sedekah', 'Donasi Kemanusiaan'])->nullable();
            $table->enum('pembayaran', ['Tunai', 'Transfer', 'Lainnya']);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuitansis');
    }
};
