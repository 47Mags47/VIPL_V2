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
        Schema::create('main__users', function (Blueprint $table) {
            $table->id();
            $table->string('FIO');
            $table->string('email');
            $table->string('division_code');
            $table->string('role_code');

            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('division_code')->references('code')->on('glossary__divisions');
            $table->foreign('role_code')->references('code')->on('glossary__user__roles');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main__users');
    }
};
