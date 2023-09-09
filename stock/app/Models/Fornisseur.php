<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornisseur extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'email',
        'name',
        'image',
        'adresse',
        'phone',
        'fix',
        'company'
    ];
}
