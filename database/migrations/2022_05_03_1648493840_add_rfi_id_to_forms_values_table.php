<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRfiIdToFormsValuesTable extends Migration
{
    public function up()
    {
        Schema::table('forms_values', function (Blueprint $table) {
            if(!Schema::hasColumn('forms_values', 'rfi_id')){
			     $table->bigInteger('rfi_id')->default(NULL);
            }
		});
    }

    public function down()
    {
         Schema::table('forms_values', function (Blueprint $table) {
            $table->dropColumn('rfi_id');
        });
    }
}