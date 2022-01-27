<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defenses', function (Blueprint $table) {
            $table->id();
            //user-id form
            $table->string('id_Etudiant')->unique();
            //supervisor_id
            $table->unsignedBigInteger('id_Supervisor');
            $table->foreign('id_Supervisor')->references('user_id')->on('supervisors');
            // Etudiant form
            // firstname
            $table->string('firstnameEtudiant');
            //lastname
            $table->string('lastnameEtudiant');
            //email
            $table->string('emailEtudiant')->unique();
            //phone
            $table->string('phoneEtudiant', 10)->unique();
            //faculty
            $table->string('facultyEtudiant');
            //specialite
            $table->string('specialtyEtudiant');
            //project
            $table->string('projectEtudiant');
            //summary
            $table->string('summaryEtudiant');
            //Supervisor Email
            $table->string('supervisor_email');
            //Jury
            $table->string('presidentName', 60);
            $table->string('examinerName', 60);
            $table->string('guestName', 60);
            $table->string('presidentUniversity');
            $table->string('examinerUniversity');
            $table->string('guestUniversity');
            // date Defense
            $table->date('dateDefense');
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
        Schema::dropIfExists('defenses');
    }
}
