<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [ 'firstname', 'lastname', 
    'CIN', 'CNE', 'birthday', 'city', 'email', 
    'phone', 'address', 'faculty', 'specialty', 
    'supervisor', 'project', 'summary'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function defense()
    {
        return $this->hasOne('App\Defense');
    }
  
}
