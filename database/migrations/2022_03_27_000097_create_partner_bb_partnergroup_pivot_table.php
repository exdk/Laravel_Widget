<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerBbPartnergroupPivotTable extends Migration
{
    public function up()
    {
        Schema::create('partner_bb_partnergroup', function (Blueprint $table) {
            $table->unsignedBigInteger('partnergroup_id');
            $table->foreign('partnergroup_id', 'partnergroup_id_fk_6296001')->references('id')->on('partnergroups')->onDelete('cascade');
            $table->unsignedBigInteger('partner_bb_id');
            $table->foreign('partner_bb_id', 'partner_bb_id_fk_6296001')->references('id')->on('partner_bbs')->onDelete('cascade');
        });
    }
}
