<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListproductsTable extends Migration
{
    public function up()
    {
        Schema::create('listproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_vnutr')->nullable();
            $table->string('quantity')->nullable();
            $table->string('type_pack')->nullable();
            $table->string('unitcount')->nullable();
            $table->string('tr_quan')->nullable();
            $table->string('qua_pal')->nullable();
            $table->string('total_quant')->nullable();
            $table->string('total_weight')->nullable();
            $table->string('total_sum')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
