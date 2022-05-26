<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRfisTable extends Migration
{
    public function up()
    {
        Schema::table('rfis', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id', 'contact_fk_5876480')->references('id')->on('contactpeople');
            $table->unsignedBigInteger('contact_2_id')->nullable();
            $table->foreign('contact_2_id', 'contact_2_fk_5876481')->references('id')->on('contactpeople');
            $table->unsignedBigInteger('id_1_id')->nullable();
            $table->foreign('id_1_id', 'id_1_fk_5965366')->references('id')->on('anketa');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_5880842')->references('id')->on('teams');
        });
    }
}
