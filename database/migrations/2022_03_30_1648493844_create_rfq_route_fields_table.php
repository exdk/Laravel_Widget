<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfqRouteFieldsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rfq_route_fields')) {
            Schema::create('rfq_route_fields', function (Blueprint $table) {

    		$table->bigIncrements('id', true)->unsigned();
    		$table->bigInteger('rfq_id');
    		$table->bigInteger('rfq_route_id');
    		$table->string('title',255);
    		$table->string('value',500);
    		$table->timestamp('created_at')->nullable()->default(NULL);
    		$table->timestamp('updated_at')->nullable()->default(NULL);
    		$table->timestamp('deleted_at')->nullable()->default(NULL);

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rfq_route_fields');
    }
}