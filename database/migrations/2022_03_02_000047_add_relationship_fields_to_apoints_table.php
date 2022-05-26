<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApointsTable extends Migration
{
    public function up()
    {
        Schema::table('apoints', function (Blueprint $table) {
        	if(!Schema::hasColumn('apoints', 'country_id')){
            	$table->unsignedBigInteger('country_id')->nullable();
            	$table->foreign('country_id', 'country_fk_5879318')->references('id')->on('countries');
        	}

        	if(!Schema::hasColumn('apoints', 'team_id')){
	            $table->unsignedBigInteger('team_id')->nullable();
	            $table->foreign('team_id', 'team_fk_5880856')->references('id')->on('teams');
        	}
        });
    }
}
