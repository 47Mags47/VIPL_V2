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
        Schema::create('main__package__files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('path');
            $table->string('status_code');
            $table->string('bank_code');
            $table->foreignId('upload_user_id')->constrained('main__users');

            $table->foreignUuid('package_id')->constrained('main__packages');
            $table->foreign('status_code')->references('code')->on('glossary__package__file_statuses');
            $table->foreign('bank_code')->references('code')->on('glossary__banks');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__package__files');
    }
};
