<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function client(){
        return $this->hasOne('App\Client');
    }
    public function resolveur(){
        return $this->hasOne('App\Resolveur');
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        
        'name',
        'resolveur_id',
        'client_id',
        

        
    ];
}
