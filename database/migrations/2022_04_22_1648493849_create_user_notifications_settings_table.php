<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsSettingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('user_notifications_settings')) {
            Schema::create('user_notifications_settings', function (Blueprint $table) {

    		$table->bigIncrements('id')->unsigned();
    		$table->bigInteger('user_id');
    		$table->tinyInteger('rfi_start')->default(1);
    		$table->tinyInteger('rfi_end')->default(1);
    		$table->tinyInteger('rfq_start')->default(1);
    		$table->tinyInteger('rfq_end')->default(1);
    		$table->tinyInteger('tms_attached')->default(1);
    		$table->tinyInteger('tms_status_changed')->default(1);
    		$table->timestamp('created_at')->nullable();
    		$table->timestamp('updated_at')->nullable();

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('user_notifications_settings');
    }
}