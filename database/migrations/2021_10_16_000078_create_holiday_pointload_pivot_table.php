<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayPointloadPivotTable extends Migration
{
    public function up()
    {
        Schema::create('holiday_pointload', function (Blueprint $table) {
            $table->unsignedBigInteger('pointload_id');
            $table->foreign('pointload_id', 'pointload_id_fk_4979858')->references('id')->on('pointloads')->onDelete('cascade');
            $table->unsignedBigInteger('holiday_id');
            $table->foreign('holiday_id', 'holiday_id_fk_4979858')->references('id')->on('holidays')->onDelete('cascade');
        });
    }
}
