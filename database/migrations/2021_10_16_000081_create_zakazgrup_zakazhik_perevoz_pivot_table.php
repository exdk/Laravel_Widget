<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakazgrupZakazhikPerevozPivotTable extends Migration
{
    public function up()
    {
        Schema::create('zakazgrup_zakazhik_perevoz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakazgrup_id');
            $table->foreign('zakazgrup_id', 'zakazgrup_id_fk_4979936')->references('id')->on('zakazgrups')->onDelete('cascade');
            $table->unsignedBigInteger('zakazhik_perevoz_id');
            $table->foreign('zakazhik_perevoz_id', 'zakazhik_perevoz_id_fk_4979936')->references('id')->on('zakazhik_perevozs')->onDelete('cascade');
        });
    }
}
