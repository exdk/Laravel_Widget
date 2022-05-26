<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('own')->nullable();
            $table->string('own_inn')->nullable();
            $table->string('govnomer')->nullable();
            $table->string('marka')->nullable();
            $table->string('model')->nullable();
            $table->string('vin')->nullable();
            $table->string('type_kuzov')->nullable();
            $table->string('category_tc')->nullable();
            $table->string('year_ot')->nullable();
            $table->string('color')->nullable();
            $table->string('horse')->nullable();
            $table->string('ecoclass')->nullable();
            $table->string('pt_type')->nullable();
            $table->string('pt_nomer')->nullable();
            $table->string('max_nagruz')->nullable();
            $table->string('beznagruz')->nullable();
            $table->date('pt_date')->nullable();
            $table->string('registry')->nullable();
            $table->string('kolo')->nullable();
            $table->string('bakov')->nullable();
            $table->string('bakov_volume')->nullable();
            $table->string('bakov_volume_2')->nullable();
            $table->string('levelco_2')->nullable();
            $table->string('vnutr_dlina')->nullable();
            $table->string('vnutr_weight')->nullable();
            $table->string('vnutr_height')->nullable();
            $table->string('vnutr_kub')->nullable();
            $table->string('holod')->nullable();
            $table->string('temp_ot')->nullable();
            $table->string('temp_do')->nullable();
            $table->string('type_tahograf')->nullable();
            $table->string('fuel')->nullable();
            $table->string('gidrolift')->nullable();
            $table->boolean('koniki')->default(0)->nullable();
            $table->boolean('ekmt')->default(0)->nullable();
            $table->boolean('remni')->default(0)->nullable();
            $table->string('palet')->nullable();
            $table->string('type_kabin')->nullable();
            $table->string('engine_type')->nullable();
            $table->string('volume')->nullable();
            $table->string('gruzopod')->nullable();
            $table->boolean('dogruz')->default(0)->nullable();
            $table->string('operator_gps')->nullable();
            $table->string('nomer_dat_gps')->nullable();
            $table->string('nomer_mac')->nullable();
            $table->boolean('rozisk')->default(0)->nullable();
            $table->boolean('zalog')->default(0)->nullable();
            $table->boolean('htraf_gibdd')->default(0)->nullable();
            $table->string('ob_type')->nullable();
            $table->string('op_nemer')->nullable();
            $table->date('ob_date_ot')->nullable();
            $table->string('ka_type')->nullable();
            $table->string('ka_nomer')->nullable();
            $table->date('ka_date_ot')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
