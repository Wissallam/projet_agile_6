<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function resolveurs(){
        
        return $this->belongsToMany('App\Resolveur');
    }
    public function reclameur(){
        
        return $this->hasOne('App\Reclameur');
    }
    public function client(){
        
        return $this->hasOne('App\Client');
    }
   
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        
        'titre',      
    ];
}
