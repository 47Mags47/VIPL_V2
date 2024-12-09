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
        Schema::create('main__calendar__generator__rules', function (Blueprint $table) {
            $table->id();
            $table->string('status_code');
            $table->date('date_start');
            $table->string('period_code');
            $table->string('description');
            $table->date('date_end');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_code')->references('code')->on('glossary__calendar__generator__rule_statuses');
            $table->foreign('period_code')->references('code')->on('glossary__calendar__generator__rule_periods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__calendar__generator__rules');
    }
};
