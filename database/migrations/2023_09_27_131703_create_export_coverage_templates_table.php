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
        Schema::create('export_coverage_templates', function (Blueprint $table) {
            $table->id();
            $table->string('lga');
            $table->bigInteger('ccd_teams');
            $table->bigInteger('ccd_syched');
            $table->bigInteger('child_spaq1');
            $table->bigInteger('child_spaq2');
            $table->bigInteger('redose_spaq1');
            $table->bigInteger('redose_spaq2');
            $table->bigInteger('referral1');
            $table->bigInteger('referral2');
            $table->bigInteger('adr1');
            $table->bigInteger('adr2');
            $table->bigInteger('total_spaq');
            $table->bigInteger('total_wastage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_coverage_templates');
    }
};
