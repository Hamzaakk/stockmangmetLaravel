<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employée extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name' ,
        'phone',
        'service_id',
        'adresse',
        'image'
    ];
}
