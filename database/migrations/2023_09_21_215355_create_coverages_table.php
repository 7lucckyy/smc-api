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
        Schema::create('coverages', function (Blueprint $table) {
            $table->id();
            $table->string('lga');
            $table->bigInteger('cdd_teams');
            $table->bigInteger('cdd_syched');
            $table->bigInteger('child_who_received_spaq1');
            $table->bigInteger('child_who_received_spaq2');
            $table->bigInteger('redose_spaq1');
            $table->bigInteger('redose_spaq2');
            $table->bigInteger('referral1');
            $table->bigInteger('referral2');
            $table->bigInteger('total_adr');
            $table->bigInteger('total_ineligible');
            $table->bigInteger('target');
            $table->bigInteger('total_spaq');
            $table->bigInteger('total_wastage');
            $table->string('day');
            $table->string('cycle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coverages');
    }
};
