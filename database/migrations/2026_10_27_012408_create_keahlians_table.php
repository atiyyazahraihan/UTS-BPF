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
       Schema::create('keahlian', function (Blueprint $table) {
        $table->id();
        $table->foreignId('biodata_id')
              ->constrained((new \App\Models\Biodata)->getTable())
              ->cascadeOnDelete();
        $table->string('nama');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keahlians');
    }
};
