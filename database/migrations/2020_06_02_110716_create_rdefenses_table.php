<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdefensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdefenses', function (Blueprint $table) {
            $table->id();
            $table->string('id_Etudiant')->unique();
            $table->unsignedBigInteger('id_Supervisor');
            $table->foreign('id_Supervisor')->references('user_id')->on('supervisors');
            $table->string('firstnameEtudiant');
            //lastname
            $table->string('lastnameEtudiant');
            //email
            $table->string('emailEtudiant')->unique();
            //project
            $table->string('projectEtudiant');
            //Supervisor Email
            $table->string('supervisor_email');
            $table->text('message');
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
        Schema::dropIfExists('rdefenses');
    }
}
