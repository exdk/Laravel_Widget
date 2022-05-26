<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPointloadsTable extends Migration
{
    public function up()
    {
        Schema::table('pointloads', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_4979860')->references('id')->on('countries');
            $table->unsignedBigInteger('komuperevozklient_id')->nullable();
            $table->foreign('komuperevozklient_id', 'komuperevozklient_fk_4979862')->references('id')->on('perevozklients');
            $table->unsignedBigInteger('komuzakazklient_id')->nullable();
            $table->foreign('komuzakazklient_id', 'komuzakazklient_fk_4979863')->references('id')->on('zakazchikklients');
        });
    }
}
