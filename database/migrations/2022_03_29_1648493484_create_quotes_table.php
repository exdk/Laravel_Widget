<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    public function up()
    {
    	if (!Schema::hasTable('quotes')) {
	        Schema::create('quotes', function (Blueprint $table) {

			$table->bigIncrements('id', 20)->unsigned();
			$table->bigInteger('lead_id');
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('driver_id');
			$table->bigInteger('avto_id');
			$table->bigInteger('transporter_company');
			$table->integer('quote_type');
			$table->integer('price');
			$table->integer('price_currency');
			$table->integer('distribution_type');
			$table->string('comment',300);
			$table->integer('status');
			$table->timestamp('created_at')->nullable()->default(NULL);
			$table->timestamp('updated_at')->nullable()->default(NULL);
			$table->timestamp('deleted_at')->nullable()->default(NULL);

	        });
    	}
    }

    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}