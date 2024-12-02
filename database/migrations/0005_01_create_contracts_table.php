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
        Schema::create('glossary__contracts', function (Blueprint $table) {
            $table->id();

            $table->string('bank_code');
            $table->foreign('bank_code')->references('code')->on('glossary__banks');

            $table->string('number');
            $table->string('division_name');
            $table->string('INN');
            $table->string('division_account');
            $table->string('BIK');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary__contracts');
    }
};
