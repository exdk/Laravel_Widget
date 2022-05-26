<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMonitorngsTable extends Migration
{
    public function up()
    {
        Schema::table('monitorngs', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id', 'driver_fk_4980343')->references('id')->on('drivers');
        });
    }
}
