<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defense extends Model
{
    protected $fillable = [ 'firstnameEtudiant', 'lastnameEtudiant', 
    'emailEtudiant', 'phoneEtudiant', 'facultyEtudiant', 'specialtyEtudiant', 'projectEtudiant', 
    'summaryEtudiant', 'supervisor_email', 'presidentName', 'examinerName', 
    'guestName', 'presidentUniversity', 'examinerUniversity', 'guestUniversity', 'dateDefense'];

    public function user()
    {
        return $this->belongsTo('App\Form');
    }
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }
}
