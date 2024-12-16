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
    Schema::create('stories', function (Blueprint $table) {
        $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
        $table->string('title');
        $table->string('story_image')->nullable();
        $table->integer('view_count')->default(0);
        $table->integer('like_count')->default(0);
        $table->foreignId('id_author')->nullable()->constrained('authors')->cascadeOnDelete();
        $table->timestamps();
    });    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
