<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListproductsTable extends Migration
{
    public function up()
    {
        Schema::table('listproducts', function (Blueprint $table) {
            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id', 'title_fk_4980371')->references('id')->on('products');
            $table->unsignedBigInteger('type_pack_tr_id')->nullable();
            $table->foreign('type_pack_tr_id', 'type_pack_tr_fk_4980381')->references('id')->on('typepacks');
            $table->unsignedBigInteger('type_pal_id')->nullable();
            $table->foreign('type_pal_id', 'type_pal_fk_4980383')->references('id')->on('type_palets');
        });
    }
}
