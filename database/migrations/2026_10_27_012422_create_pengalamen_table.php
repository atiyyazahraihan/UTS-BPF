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
        Schema::create('pengalaman', function (Blueprint $table) {
        $table->id();
        $table->foreignId('biodata_id')
              ->constrained((new \App\Models\Biodata)->getTable())
              ->cascadeOnDelete();
        $table->string('posisi');
        $table->string('perusahaan');
        $table->string('periode');
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalamen');
    }
};
