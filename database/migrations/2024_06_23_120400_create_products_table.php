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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_kz');
            $table->string('title_ru')->nullable();
            $table->text('description_kz')->nullable();
            $table->text('description_ru')->nullable();
            $table->double('real_price');
            $table->double('discount_price')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->boolean('is_exist')->default(true);
            $table->bigInteger('sub_category_id')->unsigned();
            $table->timestamps();

            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
