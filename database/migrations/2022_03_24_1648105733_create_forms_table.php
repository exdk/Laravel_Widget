<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('forms')) {
            Schema::create('forms', function (Blueprint $table) {

    		$table->bigInteger('id', 20)->unsigned();
    		$table->string('title')->nullable()->default('NULL');
    		$table->bigInteger('user_id')->nullable();
    		$table->timestamp('created_at')->nullable()->default(NULL);
    		$table->timestamp('updated_at')->nullable()->default(NULL);
    		$table->timestamp('deleted_at')->nullable()->default(NULL);

            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
}