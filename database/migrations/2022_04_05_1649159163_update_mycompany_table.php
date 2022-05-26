<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMycompanyTable extends Migration
{
    public function up()
    {
        Schema::table('mycompans', function (Blueprint $table) {
            if(!Schema::hasColumn('mycompans', 'company_role')){
                 $table->integer('company_role')->nullable();
            }
        });
    }

    public function down()
    {
         Schema::table('mycompans', function (Blueprint $table) {
            $table->dropColumn('company_role');
        });
    }
}