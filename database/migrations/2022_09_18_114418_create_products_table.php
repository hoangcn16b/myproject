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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('product_category_id')->nullable();
            $table->string('draft')->nullable();
            $table->string('thumb')->nullable();
            $table->string('status')->nullable();
            $table->string('price')->nullable();
            $table->string('sale_off')->nullable();
            $table->string('special')->nullable();
            $table->string('ordering')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
