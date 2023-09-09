<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockEnier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id' ,
        'fornisseur_id' ,
        'lieux_id',
        'quantité' ,
        'priceforOne',
        'description',
        'total',
        'status',
        'stockinit',
        'created_at'
    ];
}
