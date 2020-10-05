<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->unsigned();
            $table->foreign('owner_id')
                  ->references('id')
                  ->on('users')
                  ->onCascade('delete');
            $table->bigInteger('question_id')->unsigned();
            $table->foreign('question_id')
                  ->references('id')
                  ->on('questions')
                  ->onCascade('delete');
            $table->bigInteger('response_id')->unsigned();
            $table->foreign('response_id')
                  ->references('id')
                  ->on('answers')
                  ->onCascade('delete');
            $table->text('description');
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
        Schema::dropIfExists('answers');
    }
}
