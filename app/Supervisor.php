<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    
    protected $fillable = [ 'name', 'university', 'departement', 'email'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function defense()
    {
        return $this->hasMany('App\Defense');
    }
    public function Rdefense()
    {
        return $this->hasMany('App\RDefense');
    }
}
