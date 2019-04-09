<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path')->nullable();
            $table->string('facebook')->nullable();
            $table->string('site')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->timestamps();
        });
        Schema::create('certificate_translations', function (Blueprint $table){
            $table->increments('id');
            $table->integer('certificate_id')->unsigned();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['certificate_id','locale']);
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
