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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->text('nama_destinasi');
            $table->text('alamat');
            $table->text('deskripsi');
            $table->text('fasilitas');
            $table->dateTime('tgl_trip');
            $table->decimal('harga_tiket');
            $table->decimal('harga_trip');
            $table->integer('durasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
