<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name' ,
        'email' ,
        'password',
        'image' ,
        'adresse',
        'description',
        'phone',
        'departemen_id',
        'role'
    ];
    // public function indepartement() {
    //     return $this->hasMany(departement::class);
    // }

   
   
   public function isAdmin()
   {
       return $this->role === 'admin';
   }

   public function isGestionnaire()
   {
     return $this->role === 'gestionnaire';
   }


   public function isGestionnairef()
   {
     return $this->role === 'gestionnairef';
   } 
}


