<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostPrimariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_primaries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admission_id')->unsigned()->index();
            $table->string('name_of_institution');
            $table->string('from');
            $table->string('to');
            $table->string('qualifications')->nullable();
            $table->foreign('admission_id')->references('id')->on('admissions')->onDelete('cascade');
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
        Schema::dropIfExists('post_primaries');
    }
}
