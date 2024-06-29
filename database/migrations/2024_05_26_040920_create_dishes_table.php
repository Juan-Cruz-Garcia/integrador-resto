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
        Schema::create('dishes', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name',75);
            $table->text('description')->nullable();
            $table->tinyInteger('category_id')->unsigned()->index();
            $table->double('price',8.2)->nullable();
            $table->string('image',300)->nullable();
            $table->string('image_alt',100)->nullable();
            $table->boolean('is_available')->default(true);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};