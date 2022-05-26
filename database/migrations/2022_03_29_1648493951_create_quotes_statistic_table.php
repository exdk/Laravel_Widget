<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesStatisticTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('quotes_statistic')) {
            Schema::create('quotes_statistic', function (Blueprint $table) {

    		$table->bigIncrements('id',true)->unsigned();
    		$table->bigInteger('quote_id');
    		$table->bigInteger('user_id');
			$table->integer('status');
    		$table->integer('stype');
			$table->string('comment',300);   
    		$table->timestamp('created_at')->nullable()->default(NULL);
    		$table->timestamp('updated_at')->nullable()->default(NULL);
    		$table->timestamp('deleted_at')->nullable()->default(NULL);

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('quotes_statistic');
    }
}