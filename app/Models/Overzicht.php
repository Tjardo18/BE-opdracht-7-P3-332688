<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Overzicht extends Model
{
    protected $table = 'Product'; // Assuming the table name is 'Product'

    public function getOverzicht()
    {
        return $this->select('Product.Id', 'Product.Barcode', 'Product.Naam', 'Magazijn.VerpakkingsEenheid')
            ->leftJoin('Magazijn', 'Product.Id', '=', 'Magazijn.ProductId')
            ->addSelect(DB::raw('IFNULL(Magazijn.AantalAanwezig, 0) AS AantalAanwezig'))
            ->orderBy('Product.Barcode', 'ASC')
            ->get();
    }
}
