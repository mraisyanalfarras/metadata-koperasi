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
        Schema::table('industris', function (Blueprint $table) {
            $table->foreign('id_kategoriindustris','fk_industris_to_kategoriindustris')->references('id')->on('kategoriindustris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industris', function (Blueprint $table) {
            $table->dropForeign('fk_industris_to_kategoriindustris');
        });
    }
};
