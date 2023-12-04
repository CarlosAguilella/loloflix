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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100)->unique();
            $table->text('description');
            $table->string('release_year', 4);
            $table->decimal('rating', 2, 2)->default(0);
            $table->decimal('ticket_price', 8, 2);
            $table->string('photo', 100)->default('photo.jpg');
            $table->string('video', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
