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
        Schema::create('Biodata_1234', function (Blueprint $table) {   // GANTI 1234 dengan NIM Anda
        $table->id();
        $table->string('nama');
        $table->string('jabatan');
        $table->string('email');
        $table->string('telepon');
        $table->string('alamat');
        $table->text('tentang')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
