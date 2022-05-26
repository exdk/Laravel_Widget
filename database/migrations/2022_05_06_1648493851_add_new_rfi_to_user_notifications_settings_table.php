<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewRfiToUserNotificationsSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('user_notifications_settings', function (Blueprint $table) {
            if(!Schema::hasColumn('user_notifications_settings', 'new_rfi')){
			     $table->tinyInteger('new_rfi')->default(1);
            }
		});
    }

    public function down()
    {
         Schema::table('user_notifications_settings', function (Blueprint $table) {
            $table->dropColumn('new_rfi');
        });
    }
}