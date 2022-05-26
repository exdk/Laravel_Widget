<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutobirgasTable extends Migration
{
    public function up()
    {
        Schema::create('autobirgas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('autotype')->nullable();
            $table->boolean('loverh')->default(0)->nullable();
            $table->boolean('lobok')->default(0)->nullable();
            $table->boolean('lozad')->default(0)->nullable();
            $table->boolean('lopoln')->default(0)->nullable();
            $table->boolean('lopop')->default(0)->nullable();
            $table->boolean('lotoiki')->default(0)->nullable();
            $table->boolean('lovorot')->default(0)->nullable();
            $table->boolean('logidrobort')->default(0)->nullable();
            $table->boolean('loapp')->default(0)->nullable();
            $table->boolean('lobreh')->default(0)->nullable();
            $table->boolean('lobort')->default(0)->nullable();
            $table->boolean('loboko')->default(0)->nullable();
            $table->boolean('dogruz')->default(0)->nullable();
            $table->boolean('hydrolift')->default(0)->nullable();
            $table->boolean('koniki')->default(0)->nullable();
            $table->float('gruzoton', 2, 2)->nullable();
            $table->float('volume', 5, 2)->nullable();
            $table->float('length', 15, 2)->nullable();
            $table->float('width', 15, 2)->nullable();
            $table->float('height', 15, 2)->nullable();
            $table->float('lengthpri', 15, 2)->nullable();
            $table->float('widthpri', 15, 2)->nullable();
            $table->float('heightpri', 15, 2)->nullable();
            $table->boolean('tir')->default(0)->nullable();
            $table->boolean('ekmt')->default(0)->nullable();
            $table->string('fromzip')->nullable();
            $table->string('fromregion')->nullable();
            $table->string('fromcity')->nullable();
            $table->string('fromulitca')->nullable();
            $table->string('fromdom')->nullable();
            $table->string('fromlong')->nullable();
            $table->string('fromlat')->nullable();
            $table->string('fromrad')->nullable();
            $table->string('tocou')->nullable();
            $table->string('tozip')->nullable();
            $table->string('toregion')->nullable();
            $table->string('tocity')->nullable();
            $table->string('toulitca')->nullable();
            $table->string('todom')->nullable();
            $table->string('tolong')->nullable();
            $table->string('tolat')->nullable();
            $table->string('torad')->nullable();
            $table->string('dop_1_adr')->nullable();
            $table->string('dop_1_rad')->nullable();
            $table->string('dop_1_tot')->nullable();
            $table->string('dop_2_adr')->nullable();
            $table->string('dop_2_rad')->nullable();
            $table->string('dop_2_tot')->nullable();
            $table->string('dop_3_adr')->nullable();
            $table->string('dop_3_rad')->nullable();
            $table->string('dop_3_tot')->nullable();
            $table->string('dop_4_adr')->nullable();
            $table->string('dop_4_rad')->nullable();
            $table->string('dop_4_tot')->nullable();
            $table->string('dop_5_adr')->nullable();
            $table->string('dop_5_rad')->nullable();
            $table->string('dop_5_tot')->nullable();
            $table->string('dop_6_adr')->nullable();
            $table->string('dop_6_rad')->nullable();
            $table->string('dop_6_tot')->nullable();
            $table->string('dop_7_adr')->nullable();
            $table->string('dop_7_rad')->nullable();
            $table->string('dop_7_tot')->nullable();
            $table->string('dop_8_adr')->nullable();
            $table->string('dop_8_rad')->nullable();
            $table->string('dop_8_tot')->nullable();
            $table->string('dop_9_adr')->nullable();
            $table->string('dop_9_rad')->nullable();
            $table->string('dop_9_tot')->nullable();
            $table->string('dop_10_adr')->nullable();
            $table->string('dop_10_rad')->nullable();
            $table->string('dop_10_tot')->nullable();
            $table->string('readyload')->nullable();
            $table->date('dateload')->nullable();
            $table->date('dateloadplu')->nullable();
            $table->string('oplatanal')->nullable();
            $table->string('oplatawithnds')->nullable();
            $table->string('oplatanonds')->nullable();
            $table->string('dopinfo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
