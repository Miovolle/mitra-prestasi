<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('penyelenggara');
            $table->text('deskripsi')->nullable();
            $table->string('kategori')->nullable(); // akademik, seni, olahraga, teknologi
            $table->string('tingkat')->nullable();  // sd, smp, sma, umum
            $table->enum('status', ['open', 'closed', 'coming'])->default('coming');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('hadiah')->nullable();
            $table->string('poster')->nullable();
            $table->string('link_daftar')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lomba');
    }
};
