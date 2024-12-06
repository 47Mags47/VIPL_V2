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
        Schema::create('glossary__banks', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('ru_code');
            $table->string('raport_type_code');
            $table->foreign('raport_type_code')->references('code')->on('glossary__bank_raport_types');
            $table->string('name');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary__banks');
    }
};
