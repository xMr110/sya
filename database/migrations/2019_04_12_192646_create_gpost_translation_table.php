<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpostTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('gposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('checked_by')->nullable();
            $table->string('email');
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('image_path');
            $table->tinyInteger('type')->default(0);
            $table->timestamps();
        });
        
        Schema::create('gpost_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('gpost_id')->unsigned()->index();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('locale')->index();

            $table->unique(['gpost_id','locale']);
            $table->foreign('gpost_id')->references('id')->on('gposts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpost_translation');
    }
}
