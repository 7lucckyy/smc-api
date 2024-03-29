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
            $table->id();
            $table->string('lga');
            $table->string('ward');
            $table->string('hf');
            $table->string('username');
            $table->string('phone')->nullable();
            $table->bigInteger('total_spaq_administered');
            $table->string('latitute');
            $table->string('longitute');
            $table->string('cycle');
            $table->string('day');
            $table->timestamps();
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
