<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('id');
            $table->Integer('category_id');
            $table->Integer('brand_id');
            $table->string('product_name');
            $table->float('product_price',10,2);
            $table->integer('product_quantity');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('product_image');
            $table->tinyInteger('pub_status');
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
