<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesQueueTable extends Migration
{
    public function up()
    {
    	if (!Schema::hasTable('quotes_queue')) {
	        Schema::create('quotes_queue', function (Blueprint $table) {

			$table->bigIncrements('id', true)->unsigned();
			$table->bigInteger('company_id')->unsigned();
			$table->bigInteger('point_start')->unsigned();
			$table->bigInteger('point_end')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('lead_id')->unsigned();
			$table->datetime('cancel_time');
			$table->tinyInteger('status');
			$table->timestamp('created_at')->nullable()->default(null);
			$table->timestamp('updated_at')->nullable()->default(null);
			$table->timestamp('deleted_at')->nullable()->default(null);

	        });
    	}
    }

    public function down()
    {
        Schema::dropIfExists('quotes_queue');
    }
}