<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpostsTable extends Migration
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gposts');
    }
}
