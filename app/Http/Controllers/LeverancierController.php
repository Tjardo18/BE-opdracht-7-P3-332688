<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeverancierController extends Controller
{

    public function __construct()
    {
    }

    public function index($id)
    {
        $result = DB::select('CALL getLeverancier(?)', [$id]);

        if ($result[0]->AantalAanwezig == 0) {
            $th = "";
            $rows = "<h1 style='text-align: center'>Er is van dit product op dit moment geen voorraad aanwezig,<br> de verwachte eerstvolgende levering is: <span>" . $result[0]->DatumEVL . "</span></h1>";
            header("Refresh: 4; url=/overzicht");
        } else {
            $th = "<th>Naam Product</th>
            <th>Datum Laatste Levering</th>
            <th>Aantal</th>
            <th>Eerstvolgende Levering</th>";

            $rows = "";
            foreach ($result as $leverancier) {

                $rows .= "<tr>
                <td>$leverancier->PNaam</td>
                <td>$leverancier->datumLevering</td>
                <td>$leverancier->aantal</td>
                <td>$leverancier->DatumEVL</td>
                </tr>";
            }
        }

        $data = [
            'title' => 'Leverings Informatie',
            'naamLeverancier' => $result[0]->LNaam,
            'contactPersoon' => $result[0]->contactPersoon,
            'leverancierNummer' => $result[0]->leverancierNummer,
            'mobiel' => $result[0]->mobiel,
            'rows' => $rows,
            'th' => $th,
        ];

        return view('leverancier', $data);
    }
}
