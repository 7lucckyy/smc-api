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
            $table->uuid('id')->primary();
            $table->string('lga');
            $table->bigInteger('cdd_teams');
            $table->bigInteger('cdd_syched');
            $table->bigInteger('child_who_received_spaq1');
            $table->bigInteger('child_who_received_spaq2');
            $table->bigInteger('redose_spaq1');
            $table->bigInteger('redose_spaq2');
            $table->bigInteger('3-11_child_referred');
            $table->bigInteger('11-59_child_referred');
            $table->bigInteger('total_suspected_adr');
            $table->bigInteger('total_ineligilbe');
            $table->bigInteger('target');
            $table->bigInteger('total_spaq');
            $table->bigInteger('total_wastage');
            $table->integer('day');
            $table->integer('cycle');
            $table->timestamps();
            $table->softDeletes();
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
