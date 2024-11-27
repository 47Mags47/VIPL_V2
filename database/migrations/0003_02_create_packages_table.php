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
        Schema::create('main__packages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('status_code');
            $table->text('comment')->nullable();

            $table->foreign('status_code')->references('code')->on('glossary__package__statuses');
            $table->foreignId('event_id')->constrained('main__calendar__events');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__packages');
    }
};
