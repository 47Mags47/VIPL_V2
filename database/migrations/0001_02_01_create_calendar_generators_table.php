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
        Schema::create('main__calendar__generators', function (Blueprint $table) {
            $table->id();
            $table->date('date_start');
            $table->string('calculation_code');
            $table->string('title');
            $table->date('date_end');
            $table->softDeletes();

            $table->foreign('calculation_code')->references('code')->on('glossary__calendar__generator_calculations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__calendar__generators');
    }
};
