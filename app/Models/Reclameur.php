<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclameur extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }
    public function client(){
        return $this->hasOne('App\Client');
        //retourner le client
    }
    public function tickets(){
        
        return $this->hasOne('App\Ticket');
        //retourner les tickets
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        
        'name',
        'user_id',
        'email',
        'client_id',
        'phone',
       

        
    ];
}
