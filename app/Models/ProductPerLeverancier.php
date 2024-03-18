<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductPerLeverancier extends Model
{
    use HasFactory;

    protected $table = 'productperleverancier';

    protected $fillable = [
        'leverancierId',
        'productId',
        'datumLevering',
        'aantal',
        'datumEerstvolgendeLevering',
        'isActief',
        'opmerkingen',
        'created_at',
        'updated_at',
    ];

    // If you want to use timestamps (created_at and updated_at)
    public $timestamps = true; // default value is false

}
