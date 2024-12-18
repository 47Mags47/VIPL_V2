<?php

use App\Models\Glossary\PackageDataColumn;
use Database\Seeders\PackageDataColumSeeder;
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

            PackageDataColumSeeder::run();

            PackageDataColumn::all()->each(function($column) use ($table){
                $table->string($column->code)->nullable();
            });
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
