<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public function reclameurs(){
        
        return $this->hasMany('App\Reclameur');
    }
    public function projects(){
        
        return $this->hasMany('App\Project');
    }
    public function tickets(){
        
        return $this->hasMany('App\Ticket');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        
        'name',
       
        'email',
       
        'phone',
     
        

        
    ];
}
