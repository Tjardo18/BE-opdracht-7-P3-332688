<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazijn extends Model
{
    use HasFactory;

    protected $table = 'magazijn';

    protected $fillable = [
        'productId',
        'verpakkingsEenheid',
        'aantalAanwezig',
        'isActief',
        'opmerkingen',
        'created_at',
        'updated_at',
    ];

    // If you want to use timestamps (created_at and updated_at)
    public $timestamps = true; // default value is false
}
