<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnketaTable extends Migration
{
    public function up()
    {
        Schema::create('anketa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('inn')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('contactdol')->nullable();
            $table->string('contactemail')->nullable();
            $table->string('contactmobile')->nullable();
            $table->string('auto')->nullable();
            $table->string('dolya')->nullable();
            $table->string('autoage')->nullable();
            $table->string('qtyotgruzok')->nullable();
            $table->string('qtypersonal')->nullable();
            $table->string('qtydrivers')->nullable();
            $table->string('targetservice')->nullable();
            $table->string('onlinetender')->nullable();
            $table->string('onlineauto')->nullable();
            $table->string('edo')->nullable();
            $table->string('gps')->nullable();
            $table->string('gpsdostup')->nullable();
            $table->string('total')->nullable();
            $table->string('garant')->nullable();
            $table->string('toplivo')->nullable();
            $table->string('faktoring')->nullable();
            $table->string('davno')->nullable();
            $table->string('opit')->nullable();
            $table->string('dolyasibur')->nullable();
            $table->string('siburstatus')->nullable();
            $table->string('attractive')->nullable();
            $table->string('better')->nullable();
            $table->string('tools')->nullable();
            $table->string('best')->nullable();
            $table->string('titleanketa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
