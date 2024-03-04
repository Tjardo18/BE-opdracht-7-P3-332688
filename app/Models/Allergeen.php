<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergeen extends Model
{
    use HasFactory;

    protected $table = 'allergeen';

    protected $fillable = [
        'naam',
        'omschrijving',
        'isActief',
        'opmerkingen',
        'created_at',
        'updated_at',
    ];

    // If you want to use timestamps (created_at and updated_at)
    public $timestamps = true; // default value is false


    public function getAllergien($id)
    {
        return $this->select('allergeen.naam AS ANaam', 'allergeen.omschrijving')
            ->join('productperallergeen', 'productperallergeen.allergeenId', '=', 'allergeen.id')
            ->join('product', 'product.id', '=', 'productperallergeen.productId')
            ->where('product.id', $id)
            ->orderBy('ANaam', 'ASC')
            ->get();
    }


    public function getProduct($id)
    {
        return $this->select('product.naam AS PNaam', 'product.barcode')
            ->from('product')
            ->where('product.id', $id)
            ->get();
    }
}
