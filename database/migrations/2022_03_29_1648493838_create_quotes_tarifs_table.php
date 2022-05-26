<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTarifsTable extends Migration
{
    public function up()
    {
    	if (!Schema::hasTable('quotes')) {
	        Schema::create('quotes_tarifs', function (Blueprint $table) {

			$table->bigIncrements('id')->unsigned();
			$table->bigInteger('company_id',20);
			$table->integer('price',11);
			$table->integer('price_currency',11);
			$table->bigInteger('point_start',20);
			$table->bigInteger('point_end',20);	
			$table->integer('quota',11);
			$table->string('kpi',100);
			$table->datetime('date_start')->default('0000-00-00 00:00:00');
	        $table->datetime('date_end')->default('0000-00-00 00:00:00');
	        $table->integer('status',1);
	        $table->bigInteger('parrent_id',11);
			$table->timestamp('created_at')->nullable()->default('NULL');
			$table->timestamp('updated_at')->nullable()->default('NULL');
			$table->timestamp('deleted_at')->nullable()->default('NULL');

	        });
    	}
    }

    public function down()
    {
        Schema::dropIfExists('quotes_tarifs');
    }
}