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
        Schema::create('export_cohorts_templates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('lga');
            $table->bigInteger('boys_spaq1');
            $table->bigInteger('boys_spaq2');
            $table->bigInteger('girls_spaq1');
            $table->bigInteger('girls_spaq2');
            $table->bigInteger('total_reached');
            $table->string('cycle');
            $table->string('day');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_cohort_templates');
    }
};
