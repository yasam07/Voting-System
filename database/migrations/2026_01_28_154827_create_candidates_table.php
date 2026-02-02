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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('party_id')->constrained()->cascadeOnDelete();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();

            // Shorter lengths (INDEX SAFE)
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();
            $table->foreignId('municipality_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ward_id')->constrained()->cascadeOnDelete();


            $table->string('name', 100);
            $table->string('email')->nullable();
            $table->string('citizenship')->unique();
            $table->string('gender');
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique([
                'party_id',
                'post_id',
                'province_id',
                'district_id',
                'municipality_id',
                'ward_id'
            ], 'unique_party_post_location');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
