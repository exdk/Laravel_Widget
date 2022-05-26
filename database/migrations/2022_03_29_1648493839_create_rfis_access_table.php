<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfisAccessTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rfis_access')) {
            Schema::create('rfis_access', function (Blueprint $table) {

    		$table->bigIncrements('id', true)->unsigned();
    		$table->bigInteger('rfi_id');
    		$table->bigInteger('partner_id');
    		$table->bigInteger('company_id');
    		$table->timestamp('created_at')->nullable()->default(NULL);
    		$table->timestamp('updated_at')->nullable()->default(NULL);
    		$table->timestamp('deleted_at')->nullable()->default(NULL);

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rfis_access');
    }
}