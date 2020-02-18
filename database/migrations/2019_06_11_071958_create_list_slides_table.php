<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default('Home slide');
            $table->string('key')->nullable()->default('home-slide');
            $table->bigInteger('author_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('list_slides');
    }
}
