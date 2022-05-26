<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerevozchikPerevozZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('perevozchik_perevoz_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4980016')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('perevozchik_perevoz_id');
            $table->foreign('perevozchik_perevoz_id', 'perevozchik_perevoz_id_fk_4980016')->references('id')->on('perevozchik_perevozs')->onDelete('cascade');
        });
    }
}
