<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRfqcountriesTable extends Migration
{
    public function up()
    {
        Schema::table('rfqcountries', function (Blueprint $table) {
            if(!Schema::hasColumn('rfqcountries', 'rfq_id')){
                $table->unsignedBigInteger('rfq_id')->nullable();
                $table->foreign('rfq_id', 'rfq_fk_5881310')->references('id')->on('rfqs');
            }

            if(!Schema::hasColumn('rfqcountries', 'apoint_id')){
                $table->unsignedBigInteger('apoint_id')->nullable();
                $table->foreign('apoint_id', 'apoint_fk_5881311')->references('id')->on('apoints');
            }

            if(!Schema::hasColumn('rfqcountries', 'bpoint_id')){
                $table->unsignedBigInteger('bpoint_id')->nullable();
                $table->foreign('bpoint_id', 'bpoint_fk_5881312')->references('id')->on('bpoits');
            }

            if(!Schema::hasColumn('rfqcountries', 'good_id')){
                $table->unsignedBigInteger('good_id')->nullable();
                $table->foreign('good_id', 'good_fk_5881315')->references('id')->on('goods');
            }

            if(!Schema::hasColumn('rfqcountries', 'pack_id')){
                $table->unsignedBigInteger('pack_id')->nullable();
                $table->foreign('pack_id', 'pack_fk_5881316')->references('id')->on('packs');
            }

            if(!Schema::hasColumn('rfqcountries', 'team_id')){
                $table->unsignedBigInteger('team_id')->nullable();
                $table->foreign('team_id', 'team_fk_5881327')->references('id')->on('teams');
            }
        });
    }
}
