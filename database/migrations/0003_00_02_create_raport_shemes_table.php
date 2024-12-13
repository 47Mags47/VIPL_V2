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
        Schema::create('glossary__raport_shemes', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('description');

            $table->string('writer')->nullable();
            $table->string('pattern')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glossary__raport_shemes');
    }
};
