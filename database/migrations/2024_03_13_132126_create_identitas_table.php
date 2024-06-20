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
        Schema::create('identitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('hari_kerja');
            $table->string('jam_kerja');
            $table->string('no_hp');
            $table->string('email');
            $table->longText('link_fb')->nullable();
            $table->longText('link_twit')->nullable();
            $table->longText('link_ig')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('maps')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas');
    }
};
