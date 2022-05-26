<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAutobirgasTable extends Migration
{
    public function up()
    {
        Schema::table('autobirgas', function (Blueprint $table) {
            $table->unsignedBigInteger('typekuz_id')->nullable();
            $table->foreign('typekuz_id', 'typekuz_fk_4980086')->references('id')->on('typekuzovas');
            $table->unsignedBigInteger('fromcou_id')->nullable();
            $table->foreign('fromcou_id', 'fromcou_fk_4980116')->references('id')->on('countries');
            $table->unsignedBigInteger('dop_1_val_id')->nullable();
            $table->foreign('dop_1_val_id', 'dop_1_val_fk_4980164')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_1_typ_id')->nullable();
            $table->foreign('dop_1_typ_id', 'dop_1_typ_fk_4980174')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_2_val_id')->nullable();
            $table->foreign('dop_2_val_id', 'dop_2_val_fk_4980165')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_2_typ_id')->nullable();
            $table->foreign('dop_2_typ_id', 'dop_2_typ_fk_4980175')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_3_val_id')->nullable();
            $table->foreign('dop_3_val_id', 'dop_3_val_fk_4980166')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_3_typ_id')->nullable();
            $table->foreign('dop_3_typ_id', 'dop_3_typ_fk_4980176')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_4_val_id')->nullable();
            $table->foreign('dop_4_val_id', 'dop_4_val_fk_4980167')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_4_typ_id')->nullable();
            $table->foreign('dop_4_typ_id', 'dop_4_typ_fk_4980177')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_5_val_id')->nullable();
            $table->foreign('dop_5_val_id', 'dop_5_val_fk_4980168')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_5_typ_id')->nullable();
            $table->foreign('dop_5_typ_id', 'dop_5_typ_fk_4980178')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_6_val_id')->nullable();
            $table->foreign('dop_6_val_id', 'dop_6_val_fk_4980169')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_6_typ_id')->nullable();
            $table->foreign('dop_6_typ_id', 'dop_6_typ_fk_4980179')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_7_val_id')->nullable();
            $table->foreign('dop_7_val_id', 'dop_7_val_fk_4980170')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_7_typ_id')->nullable();
            $table->foreign('dop_7_typ_id', 'dop_7_typ_fk_4980180')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_8_val_id')->nullable();
            $table->foreign('dop_8_val_id', 'dop_8_val_fk_4980171')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_8_typ_id')->nullable();
            $table->foreign('dop_8_typ_id', 'dop_8_typ_fk_4980181')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_9_typ_id')->nullable();
            $table->foreign('dop_9_typ_id', 'dop_9_typ_fk_4980182')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_9_val_id')->nullable();
            $table->foreign('dop_9_val_id', 'dop_9_val_fk_4980172')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_10_val_id')->nullable();
            $table->foreign('dop_10_val_id', 'dop_10_val_fk_4980173')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_10_typ_id')->nullable();
            $table->foreign('dop_10_typ_id', 'dop_10_typ_fk_4980183')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('type_load_id')->nullable();
            $table->foreign('type_load_id', 'type_load_fk_4980187')->references('id')->on('autotyploads');
            $table->unsignedBigInteger('oplataval_id')->nullable();
            $table->foreign('oplataval_id', 'oplataval_fk_4980189')->references('id')->on('valuta');
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id', 'contact_fk_4980193')->references('id')->on('users');
        });
    }
}
