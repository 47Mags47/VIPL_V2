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
        Schema::create('main__calendar__events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('generator_id')->nullable()->constrained('main__calendar__generators');
            $table->string('status_code');
            $table->string('payment_code');
            $table->string('title');
            $table->date('date');

            $table->foreign('status_code')->references('code')->on('glossary__calendar__event_statuses');
            $table->foreign('payment_code')->references('code')->on('glossary__payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__calendar__events');
    }
};
