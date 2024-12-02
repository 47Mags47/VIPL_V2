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
        Schema::create('main__package__data', function (Blueprint $table) {
            $table->id();
            $table->json('errors')->nullable();
            $table->foreignUuid('file_id')->constrained('main__package__files');

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('account')->nullable();
            $table->string('summ')->nullable();
            $table->string('pasp')->nullable();
            $table->string('birth')->nullable();
            $table->string('kbk')->nullable();
            $table->string('snils')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__package__data');
    }
};
