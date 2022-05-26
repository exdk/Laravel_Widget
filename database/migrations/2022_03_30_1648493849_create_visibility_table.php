<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisibilityTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('visibility')) {
            Schema::create('visibility', function (Blueprint $table) {

            $table->bigIncrements('id', true)->unsigned();
            $table->integer('item_type');
            $table->bigInteger('item_id');
            $table->bigInteger('company_id');
            $table->bigInteger('user_id');
            $table->integer('vtype');
            $table->timestamp('created_at')->nullable()->default(NULL);
            $table->timestamp('updated_at')->nullable()->default(NULL);
            $table->timestamp('deleted_at')->nullable()->default(NULL);
    		

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('visibility');
    }
}