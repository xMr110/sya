<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path')->nullable();
            $table->string('facebook')->nullable();
            $table->string('site')->nullable();
            $table->integer('lat')->nullable();
            $table->integer('long')->nullable();
            $table->integer('phone');
            $table->tinyInteger('featured')->default(0);
            $table->timestamps();
        });
        Schema::create('initiative_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('initiative_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['initiative_id','locale']);
            $table->foreign('initiative_id')->references('id')->on('initiatives')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('initiatives');
    }
}
