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


    public function getLeveringen($id)
    {
        return $this->select(
            'product.id AS Pid',
            'product.naam AS PNaam',
            'magazijn.VerpakkingsEenheid AS VerpakkingsEenheid',
            'productperleverancier.datumLevering AS DatumLevering',
        )
            ->addSelect(DB::raw('IFNULL(magazijn.AantalAanwezig, 0) AS AantalAanwezig'))
            ->join('leverancier', 'productperleverancier.LeverancierId', '=', 'leverancier.id')
            ->join('product', 'productperleverancier.productId', '=', 'product.id')
            ->join('magazijn', 'product.id', '=', 'magazijn.productId')
            ->join(
                DB::raw('(SELECT productId, MAX(datumLevering) as maxDatumLevering FROM productperleverancier GROUP BY productId) as sub'),
                function ($join) {
                    $join->on('productperleverancier.productId', '=', 'sub.productId');
                    $join->on('productperleverancier.datumLevering', '=', 'sub.maxDatumLevering');
                })
            ->where('leverancier.id', $id)
            ->orderBy('AantalAanwezig', 'DESC')
            ->get();
    }

}
