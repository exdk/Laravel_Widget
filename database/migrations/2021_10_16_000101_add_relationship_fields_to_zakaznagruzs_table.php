<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToZakaznagruzsTable extends Migration
{
    public function up()
    {
        Schema::table('zakaznagruzs', function (Blueprint $table) {
            $table->unsignedBigInteger('gruz_id')->nullable();
            $table->foreign('gruz_id', 'gruz_fk_4979970')->references('id')->on('gruzs');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id', 'unit_fk_4979998')->references('id')->on('unitmas');
            $table->unsignedBigInteger('grutype_id')->nullable();
            $table->foreign('grutype_id', 'grutype_fk_4979987')->references('id')->on('titilegruzs');
            $table->unsignedBigInteger('pointload_id')->nullable();
            $table->foreign('pointload_id', 'pointload_fk_4979959')->references('id')->on('pointloads');
            $table->unsignedBigInteger('cload_id')->nullable();
            $table->foreign('cload_id', 'cload_fk_4979965')->references('id')->on('pointloads');
            $table->unsignedBigInteger('ltlftl_id')->nullable();
            $table->foreign('ltlftl_id', 'ltlftl_fk_4980003')->references('id')->on('ltlftls');
            $table->unsignedBigInteger('adr_id')->nullable();
            $table->foreign('adr_id', 'adr_fk_4980006')->references('id')->on('adrs');
            $table->unsignedBigInteger('valnd_id')->nullable();
            $table->foreign('valnd_id', 'valnd_fk_4980009')->references('id')->on('valutands');
            $table->unsignedBigInteger('kurator_1_id')->nullable();
            $table->foreign('kurator_1_id', 'kurator_1_fk_4980014')->references('id')->on('users');
            $table->unsignedBigInteger('dop_1_val_id')->nullable();
            $table->foreign('dop_1_val_id', 'dop_1_val_fk_5100292')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_1_typ_id')->nullable();
            $table->foreign('dop_1_typ_id', 'dop_1_typ_fk_5100293')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_1_tam_id')->nullable();
            $table->foreign('dop_1_tam_id', 'dop_1_tam_fk_5100612')->references('id')->on('customs');
            $table->unsignedBigInteger('dop_2_val_id')->nullable();
            $table->foreign('dop_2_val_id', 'dop_2_val_fk_5100296')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_2_typ_id')->nullable();
            $table->foreign('dop_2_typ_id', 'dop_2_typ_fk_5100297')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_2_tam_id')->nullable();
            $table->foreign('dop_2_tam_id', 'dop_2_tam_fk_5100613')->references('id')->on('customs');
            $table->unsignedBigInteger('dop_3_val_id')->nullable();
            $table->foreign('dop_3_val_id', 'dop_3_val_fk_5100300')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_3_typ_id')->nullable();
            $table->foreign('dop_3_typ_id', 'dop_3_typ_fk_5100301')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_3_tam_id')->nullable();
            $table->foreign('dop_3_tam_id', 'dop_3_tam_fk_5100614')->references('id')->on('customs');
            $table->unsignedBigInteger('dop_4_val_id')->nullable();
            $table->foreign('dop_4_val_id', 'dop_4_val_fk_5100304')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_4_typ_id')->nullable();
            $table->foreign('dop_4_typ_id', 'dop_4_typ_fk_5100305')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_4_tam_id')->nullable();
            $table->foreign('dop_4_tam_id', 'dop_4_tam_fk_5100615')->references('id')->on('customs');
            $table->unsignedBigInteger('dop_5_val_id')->nullable();
            $table->foreign('dop_5_val_id', 'dop_5_val_fk_5100308')->references('id')->on('valuta');
            $table->unsignedBigInteger('dop_5_typ_id')->nullable();
            $table->foreign('dop_5_typ_id', 'dop_5_typ_fk_5100309')->references('id')->on('typeolpata');
            $table->unsignedBigInteger('dop_5_tam_id')->nullable();
            $table->foreign('dop_5_tam_id', 'dop_5_tam_fk_5100616')->references('id')->on('customs');
        });
    }
}
