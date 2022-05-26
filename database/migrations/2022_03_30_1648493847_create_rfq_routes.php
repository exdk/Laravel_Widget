<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfqRoutes extends Migration
{
    public function up()
    {
    	if (!Schema::hasTable('rfq_routes')) {
	        Schema::create('rfq_routes', function (Blueprint $table) {

			$table->bigIncrements('id', true)->unsigned();
			$table->bigInteger('rfq_id')->nullable()->unsigned();;
			$table->bigInteger('point_start')->nullable()->unsigned();;
			$table->bigInteger('point_end')->nullable()->unsigned();;
			$table->integer('car_type')->nullable()->unsigned();;
			$table->integer('car_canweight')->nullable()->unsigned();;
			$table->integer('car_canvalue')->nullable()->unsigned();;
			$table->string('DAP_DDP', 300);
			$table->string('DAP_DDP_code', 100);
			$table->string('lead_time', 50);
			$table->string('сargo_name', 100);
			$table->string('сargo_package', 100);
			$table->string('сargo_package_weight', 100);
			$table->string('value_per_month', 100);
			$table->string('otif', 300);
			$table->string('urgency', 50);
			$table->string('target_rate', 50);
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->timestamp('deleted_at')->nullable();

	        });
    	}
    }

    public function down()
    {
        Schema::dropIfExists('rfq_routes');
    }
}