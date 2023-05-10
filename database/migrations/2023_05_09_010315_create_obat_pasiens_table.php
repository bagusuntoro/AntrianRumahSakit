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
        Schema::create('obat_pasiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->timestamps();
        });

        // Schema::table('pasiens', function (Blueprint $table) {
        //     $table->dropColumn('id_obat');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->unsignedBigInteger('id_obat')->nullable();
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('set null');
        });
        
        Schema::dropIfExists('obat_pasiens');
    }
};
