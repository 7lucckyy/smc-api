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
        Schema::create('commodities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('lga');
            $table->bigInteger('spaq1');
            $table->bigInteger('spaq2');
            $table->bigInteger('total_spaq');
            $table->bigInteger('total_spaq1_used');
            $table->bigInteger('total_spaq2_used');
            $table->bigInteger('total_spaq_used');
            $table->string('day');
            $table->string('cycle');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commodities');
    }
};
