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
        Schema::create('main__raports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');

            $table->date('date');
            $table->string('payment_code');
            $table->string('bank_code');

            $table->timestamps();

            $table->foreign('payment_code')->references('code')->on('glossary__payments');
            $table->foreign('bank_code')->references('code')->on('glossary__banks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__raports');
    }
};
