<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfqcountriesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rfqcountries')) {
            Schema::create('rfqcountries', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('lead_time')->nullable();
                $table->string('otif')->nullable();
                $table->string('pack_weight')->nullable();
                $table->string('qty')->nullable();
                $table->string('qty_auto')->nullable();
                $table->string('additional')->nullable();
                $table->string('target')->nullable();
                $table->string('price')->nullable();
                $table->string('garant')->nullable();
                $table->string('comment')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
