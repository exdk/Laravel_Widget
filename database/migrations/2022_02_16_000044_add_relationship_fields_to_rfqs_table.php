<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRfqsTable extends Migration
{
    public function up()
    {
        Schema::table('rfqs', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id', 'contact_fk_5863031')->references('id')->on('contactpeople');
            $table->unsignedBigInteger('contact_2_id')->nullable();
            $table->foreign('contact_2_id', 'contact_2_fk_5869363')->references('id')->on('contactpeople');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_5880767')->references('id')->on('teams');
        });
    }
}
