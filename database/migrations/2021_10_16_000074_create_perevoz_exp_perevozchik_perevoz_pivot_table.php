<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerevozExpPerevozchikPerevozPivotTable extends Migration
{
    public function up()
    {
        Schema::create('perevoz_exp_perevozchik_perevoz', function (Blueprint $table) {
            $table->unsignedBigInteger('perevozchik_perevoz_id');
            $table->foreign('perevozchik_perevoz_id', 'perevozchik_perevoz_id_fk_4979953')->references('id')->on('perevozchik_perevozs')->onDelete('cascade');
            $table->unsignedBigInteger('perevoz_exp_id');
            $table->foreign('perevoz_exp_id', 'perevoz_exp_id_fk_4979953')->references('id')->on('perevoz_exps')->onDelete('cascade');
        });
    }
}
