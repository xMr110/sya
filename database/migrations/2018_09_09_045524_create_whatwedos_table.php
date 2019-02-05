<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhatwedosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatwedos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('image_path');
            $table->string('Date');
            $table->tinyInteger('type');
            $table->timestamps();
        });
        Schema::create('whatwedo_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('whatwedo_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('locale')->index();

            $table->unique(['whatwedo_id','locale']);
            $table->foreign('whatwedo_id')->references('id')->on('whatwedos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatwedos');
    }
}
