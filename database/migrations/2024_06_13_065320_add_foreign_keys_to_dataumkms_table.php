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
        Schema::table('dataumkms', function (Blueprint $table) {
            $table->foreign('id_kategoriumkm','fk_dataumkms_to_kategoriumkm')->references('id')->on('kategoriumkm')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dataumkms', function (Blueprint $table) {
            $table->dropForeign('fk_dataumkms_to_kategoriumkm');
        });
    }
};
