<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("vil_name")->nullable();
            $table->string("mayor_name")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("fax")->nullable();
            $table->string("email")->nullable();
            $table->string("web")->nullable();
            $table->string("image_path")->nullable();      

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
