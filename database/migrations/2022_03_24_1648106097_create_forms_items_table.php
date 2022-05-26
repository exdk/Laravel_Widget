<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsItemsTable extends Migration
{
    public function up()
    {
    	if (!Schema::hasTable('forms_items')) {
	        Schema::create('forms_items', function (Blueprint $table) {

			$table->bigInteger('id', 20)->unsigned();
			$table->string('placeholder')->nullable()->default('NULL');
			$table->bigInteger('user_id');
			$table->integer('form_id');
			$table->integer('parrent_id');
			$table->tinyInteger('item_type');
			$table->integer('points');
			$table->timestamp('created_at')->nullable()->default(NULL);
			$table->timestamp('updated_at')->nullable()->default(NULL);
			$table->timestamp('deleted_at')->nullable()->default(NULL);

	        });
    	}
    }

    public function down()
    {
        Schema::dropIfExists('forms_items');
    }
}