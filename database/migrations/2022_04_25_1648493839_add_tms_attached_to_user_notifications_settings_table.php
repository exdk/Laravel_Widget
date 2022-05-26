<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTmsAttachedToUserNotificationsSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('user_notifications_settings', function (Blueprint $table) {
            if(!Schema::hasColumn('user_notifications_settings', 'tms_attached')){
			     $table->tinyInteger('tms_attached')->default(1);
            }

            if(!Schema::hasColumn('user_notifications_settings', 'tms_status_changed')){
			     $table->tinyInteger('tms_status_changed')->default(1);
            }
		});
    }

    public function down()
    {
         Schema::table('user_notifications_settings', function (Blueprint $table) {
            $table->dropColumn('tms_attached');
			$table->dropColumn('tms_status_changed');
        });
    }
}