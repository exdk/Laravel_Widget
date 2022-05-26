<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRfiAlertToUserNotificationsSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('user_notifications_settings', function (Blueprint $table) {
            if(!Schema::hasColumn('user_notifications_settings', 'rfi_alert')){
			     $table->tinyInteger('rfi_alert')->default(1);
            }
		});
    }

    public function down()
    {
         Schema::table('user_notifications_settings', function (Blueprint $table) {
            $table->dropColumn('rfi_alert');
        });
    }
}