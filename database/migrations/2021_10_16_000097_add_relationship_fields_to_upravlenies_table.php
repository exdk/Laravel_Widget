<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUpravleniesTable extends Migration
{
    public function up()
    {
        Schema::table('upravlenies', function (Blueprint $table) {
            $table->unsignedBigInteger('mainauto_id');
            $table->foreign('mainauto_id', 'mainauto_fk_4980055')->references('id')->on('autos');
            $table->unsignedBigInteger('prizep_id')->nullable();
            $table->foreign('prizep_id', 'prizep_fk_4980056')->references('id')->on('autos');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id', 'driver_fk_4980057')->references('id')->on('drivers');
            $table->unsignedBigInteger('driver_2_id')->nullable();
            $table->foreign('driver_2_id', 'driver_2_fk_4980062')->references('id')->on('drivers');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4980061')->references('id')->on('teams');
        });
    }
}
