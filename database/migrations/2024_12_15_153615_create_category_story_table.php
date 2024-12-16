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
    Schema::create('category_story', function (Blueprint $table) {
        $table->foreignId('id_category')->constrained('categories')->cascadeOnDelete();
        $table->foreignId('id_story')->constrained('stories')->cascadeOnDelete();
        $table->primary(['id_category', 'id_story']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_story');
    }
};
