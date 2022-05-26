<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
         if (!Schema::hasTable('leads')) {
                Schema::create('leads', function (Blueprint $table) {

            		$table->bigIncrements('id', 20)->unsigned();
                    $table->tinyInteger('status')->unsigned();
                    $table->integer('perevoz_type')->unsigned();
                    $table->string('gruz_title',300);
                    $table->string('gruz_package',300);
                    $table->bigInteger('gruz_weight')->unsigned();
                    $table->bigInteger('gruz_value')->unsigned();
                    $table->string('gruz_documents',300);
                    $table->bigInteger('gruz_company_id')->unsigned();
                    $table->bigInteger('gruz_company_dispatcher')->unsigned();
            		
                    $table->string('postavka_id',50);
                    $table->string('postavka_number',50);
                    
                    $table->bigInteger('point_start')->unsigned();
                    $table->datetime('date_start')->default(null);
                    $table->time('loading_time');
                    $table->bigInteger('point_end')->unsigned();
                    $table->datetime('date_end')->default(null); 
                    $table->time('unloading_time');

                    $table->bigInteger('transport_type_id')->unsigned();
                    $table->bigInteger('transport_canweight')->unsigned();
                    $table->integer('transport_value')->unsigned();

                    $table->string('comment',300);

            		$table->timestamp('created_at')->nullable()->default(NULL);
            		$table->timestamp('updated_at')->nullable()->default(NULL);
            		$table->timestamp('deleted_at')->nullable()->default(NULL); 

                });
         }
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
}