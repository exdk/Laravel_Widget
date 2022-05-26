<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fam')->nullable();
            $table->string('name')->nullable();
            $table->string('oth')->nullable();
            $table->date('date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('pa_ty')->nullable();
            $table->string('pa_nomer')->nullable();
            $table->string('pachecked')->nullable();
            $table->date('pa_date')->nullable();
            $table->string('pa_kod')->nullable();
            $table->longText('pa_by')->nullable();
            $table->string('adr_pro')->nullable();
            $table->string('pro_date')->nullable();
            $table->string('pro_vr_adr')->nullable();
            $table->date('pro_vr_date_ot')->nullable();
            $table->date('pro_vr_date_do')->nullable();
            $table->string('nomervu')->nullable();
            $table->string('vuchecked')->nullable();
            $table->date('datevu')->nullable();
            $table->string('byvu')->nullable();
            $table->string('vu_gorod')->nullable();
            $table->string('taho')->nullable();
            $table->string('inn')->nullable();
            $table->string('pfr')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_a')->nullable();
            $table->string('mobile_b')->nullable();
            $table->string('medb_nomer')->nullable();
            $table->string('medb_typ')->nullable();
            $table->date('medb_date_ot')->nullable();
            $table->string('trud_nomer')->nullable();
            $table->date('trud_date_ot')->nullable();
            $table->string('trud_dol')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
