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
            $table->string('product_name');
            $table->text('product_short_des');
            $table->text('product_long_des');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('product_category_id');
            $table->integer('product_subcategory_id');
            $table->string('slug');
            $table->string('product_img');
            $table->string('product_subcategory_name');
            $table->string('product_category_name');
            $table->integer('product_count')->default(0);

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
