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
        Schema::create('dataumkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_umkm');
            $table->foreignId('id_kategoriumkm')->nullable()->index('fk_dataumkms_to_kategoriumkm');
            $table->longText('foto')->nullable();
            $table->longText('alamat');
            $table->string('pemilik');
            $table->string('no_telp');
            $table->string('email');
            $table->date('tgl_berdiri');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataumkms');
    }
};
