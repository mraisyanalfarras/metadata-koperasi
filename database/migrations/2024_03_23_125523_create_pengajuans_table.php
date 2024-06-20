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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('email');
            $table->string('nama');
            $table->date('tanggal');
            $table->foreignId('id_jenis_surats')->nullable()->index('fk_pengajuans_to_jenis_surats');
            $table->longText('ktp')->nullable();
            $table->longText('kk')->nullable();
            $table->string('no_hp');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
