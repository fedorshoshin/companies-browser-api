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
        Schema::create('organization_occupations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('organization_id')->constrained('organizations', 'id');
            $table->foreignId('occupation_id')->constrained('occupations', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_occupations');
    }
};
