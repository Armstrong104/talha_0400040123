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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('author_name');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 = active and 0 = inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
