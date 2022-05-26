<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocTtnsTable extends Migration
{
    public function up()
    {
        Schema::table('doc_ttns', function (Blueprint $table) {
            $table->unsignedBigInteger('id_list_product_id')->nullable();
            $table->foreign('id_list_product_id', 'id_list_product_fk_4980387')->references('id')->on('listproducts');
            $table->unsignedBigInteger('otpravitel_id')->nullable();
            $table->foreign('otpravitel_id', 'otpravitel_fk_4980388')->references('id')->on('mycompans');
            $table->unsignedBigInteger('poluchatel_id')->nullable();
            $table->foreign('poluchatel_id', 'poluchatel_fk_4980389')->references('id')->on('zakazchikklients');
        });
    }
}
