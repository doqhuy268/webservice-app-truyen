<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('histories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
        $table->foreignId('id_story')->constrained('stories')->cascadeOnDelete();
        $table->foreignId('id_chapter')->constrained('chapters')->cascadeOnDelete();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
