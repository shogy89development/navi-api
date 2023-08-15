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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building');
            $table->string('name')->nullable();
            $table->string('floor')->nullable();
            $table->unsignedInteger('room')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('rental', 10, 2);
            $table->decimal('surface', 10, 2);
            $table->unsignedInteger('bedrooms')->nullable();
            $table->boolean('reserved')->default(false);
            $table->integer('type');
            $table->integer('tour');
            $table->string('side')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
