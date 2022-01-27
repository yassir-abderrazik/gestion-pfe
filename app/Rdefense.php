<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdefense extends Model
{
    protected $fillable = [ 'id_Etudiant', 'firstnameEtudiant', 'lastnameEtudiant',
    'emailEtudiant' ,'projectEtudiant', 'projectEtudiant', 'supervisor_email', 'message'];
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }
}
