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
        Schema::create('main__validator_rules', function (Blueprint $table) {
            $table->id();
            $table->string('type_code');
            $table->string('column_code');
            $table->string('value')->nullable();

            $table->foreign('type_code')->references('code')->on('glossary__validator_types');
            $table->foreign('column_code')->references('code')->on('glossary__package__data_columns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__validator_rules');
    }
};
