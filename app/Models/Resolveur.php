<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolveur extends Model
{
    use HasFactory;
    public function tickets(){
        return $this->belongsToMany('App\Ticket');
    }
    public function projects(){
        
        return $this->hasMany('App\Projet');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        
        'name',
        'user_id',
        'specialite',
        'email',
        'phone',
       

        
    ];
}
