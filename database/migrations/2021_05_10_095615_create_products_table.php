<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('SKU');
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->string('weight')->nullable();
            $table->string('colors')->nullable();
            $table->string('dimensions')->nullable();
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);
            $table->decimal('price');
            $table->decimal('sales_price')->nullable();
            $table->enum('stuck_status', ['instuck', 'outofstuck']);
            $table->unsignedInteger('quantity')->default(12);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
