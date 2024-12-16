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
            $table->foreignId('rule_id')->nullable()->constrained('main__calendar__generator__rules');
            $table->string('payment_code');
            $table->string('status_code');
            $table->string('description');
            $table->date('date');
            $table->timestamps();

            $table->foreign('payment_code')->references('code')->on('glossary__payments');
            $table->foreign('status_code')->references('code')->on('glossary__calendar__event_statuses');
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
