<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('CIN', 8)->unique();
            $table->string('CNE', 10)->unique();
            $table->date('birthday');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('phone', 10)->unique();
            $table->text('address');
            $table->string('faculty');
            $table->string('specialty');
            $table->string('supervisor');
            $table->string('project');
            $table->string('summary');
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
        Schema::dropIfExists('forms');
    }
}
