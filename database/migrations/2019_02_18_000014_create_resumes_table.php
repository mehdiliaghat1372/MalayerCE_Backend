<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id')->unsigned();

            $table->string('title');
            $table->text('description');
            $table->string('file');
            $table->enum('type', ['article', 'project', 'thesis', 'honor']);

            $table->foreign('professor_id')
                ->references('id')
                ->on('professors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('create_date');
            $table->string('update_date')->nullable();
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
        Schema::dropIfExists('resumes');
    }
}
