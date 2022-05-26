<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsValuesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('forms_values')) {
            Schema::create('forms_values', function (Blueprint $table) {

    		$table->bigInteger('id',true)->unsigned();
    		$table->string('value')->nullable()->default(NULL);
    		$table->bigInteger('user_id');
    		$table->integer('form_id');
    		$table->integer('item_id');
    		$table->timestamp('created_at')->nullable()->default(NULL);
    		$table->timestamp('updated_at')->nullable()->default(NULL);
    		$table->timestamp('deleted_at')->nullable()->default(NULL);

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('forms_values');
    }
}