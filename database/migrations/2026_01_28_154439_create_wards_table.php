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
        Schema::create('wards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipality_id')->constrained()->cascadeOnDelete();
            $table->string('ward_no', 10);
            $table->timestamps();

            $table->unique(['municipality_id', 'ward_no']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
};
