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
        Schema::create('visits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('lga');
            $table->string('ward');
            $table->string('hf');
            $table->string('username');
            $table->string('phone')->nullable();
            $table->bigInteger('total_spaq_administered');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('cycle');
            $table->integer('day');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
