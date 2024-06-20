<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('datapasars', function (Blueprint $table) {
            $table->id();
            $table->string('namapasar');
            $table->foreignId('id_kecamatan')->nullable()->index('fk_datapasars_to_kecamatan');
            $table->longText('foto')->nullable();
            $table->longText('alamat');
            $table->string('jumlah_kios');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapasars');
    }
};
