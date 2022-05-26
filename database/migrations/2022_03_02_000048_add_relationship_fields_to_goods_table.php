<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGoodsTable extends Migration
{
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
        	if(!Schema::hasColumn('goods', 'team_id')){
	            $table->unsignedBigInteger('team_id')->nullable();
	            $table->foreign('team_id', 'team_fk_5880873')->references('id')->on('teams');
        	}
        });
    }
}
