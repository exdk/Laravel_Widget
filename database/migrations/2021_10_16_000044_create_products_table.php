<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code')->nullable();
            $table->string('nomer_pricelist')->nullable();
            $table->string('articel')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('unit_izm')->nullable();
            $table->string('type_pack')->nullable();
            $table->string('weight')->nullable();
            $table->string('nomer_decalaration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
