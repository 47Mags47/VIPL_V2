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
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->string('period_code');
            $table->string('status_code');
            $table->string('payment_code')->nullable();
            $table->string('description');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('period_code')->references('code')->on('glossary__calendar__generator__rule_periods');
            $table->foreign('status_code')->references('code')->on('glossary__calendar__generator__rule_statuses');
            $table->foreign('payment_code')->references('code')->on('glossary__payments');
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
