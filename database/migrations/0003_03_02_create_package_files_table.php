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
        Schema::create('main__package_files', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('path');

            $table->foreignUuid('package_uuid')->constrained('main__packages', 'uuid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__package_files');
    }
};