<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path')->nullable();
            $table->string('facebook')->nullable();
            $table->string('site')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->timestamps();
        });
        Schema::create('program_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('program_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['program_id','locale']);
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
