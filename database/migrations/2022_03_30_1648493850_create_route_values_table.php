<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteValuesTable extends Migration
{
    public function up()
    {
         if (!Schema::hasTable('rfq_route_values')) {
                Schema::create('rfq_route_values', function (Blueprint $table) {

                $table->bigIncrements('id', true)->unsigned();
                $table->bigInteger('rfq_route_id');
                $table->bigInteger('quota');
                $table->bigInteger('tarif');
                $table->bigInteger('company_id');
                $table->timestamp('created_at')->nullable()->default(NULL);
                $table->timestamp('updated_at')->nullable()->default(NULL);
                $table->timestamp('deleted_at')->nullable()->default(NULL);
        		

                });
         }
    }

    public function down()
    {
        Schema::dropIfExists('rfq_route_values');
    }
}