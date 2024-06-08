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
        Schema::create('donaturs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('phone');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('kecamatan', ['Adipala', 'Bantarsari', 'Binangun', 'Cilacap Selatan', 'Cilacap Tengah', 'Cilacap Utara', 'Cimanggu', 'Cipari', 'Dayeuhluhur', 'Gandrungmangu', 'Jeruklegi', 'Kampung Laut', 'Karangpucung', 'Kawunganten', 'Kedungreja', 'Kesugihan', 'Kroya', 'Majenang', 'Maos', 'Nusawungu', 'Patimuan', 'Sampang', 'Sidareja', 'Wanareja']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaturs');
    }
};
