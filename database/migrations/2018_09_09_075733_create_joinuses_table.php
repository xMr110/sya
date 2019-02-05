<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('joinus_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('joinus_id')->unsigned();
            $table->text('body')->nullable();
            $table->string('locale')->index();

            $table->unique(['joinus_id','locale']);
            $table->foreign('joinus_id')->references('id')->on('joinuses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joinuses');
    }
}
