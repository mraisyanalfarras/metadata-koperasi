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
        Schema::create('industris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_industri');
            $table->foreignId('id_kategoriindustris')->nullable()->index('fk_industris_to_kategoriindustris');
            $table->string('Nama_Pemilik');
            $table->string('alamat');
            $table->longText('deskripsi');
            $table->longText('foto')->nullable();
            $table->string('no_telp');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industris');
    }
};
