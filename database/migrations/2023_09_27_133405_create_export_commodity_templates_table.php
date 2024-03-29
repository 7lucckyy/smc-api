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
        Schema::create('export_commodity_templates', function (Blueprint $table) {
            $table->id();
            $table->string('lga');
            $table->bigInteger('spaq1');
            $table->bigInteger('spaq2');
            $table->bigInteger('total_spaq');
            $table->bigInteger('total_spaq1_used');
            $table->bigInteger('total_spaq2_used');
            $table->bigInteger('total_spaq_used');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_commodity_templates');
    }
};
