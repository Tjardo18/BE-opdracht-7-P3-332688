<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverzichtLeverancierController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $result = DB::select('CALL getLeverancierIndividual()');

        $rows = "";
        foreach ($result as $leverancier) {

            $rows .= "<tr>
                <td>$leverancier->Naam</td>
                <td>$leverancier->ContactPersoon</td>
                <td>$leverancier->LeverancierNummer</td>
                <td>$leverancier->Mobiel</td>
                <td>$leverancier->ProductCount</td>
                <td>
                    <a href='/leveringen/$leverancier->id'>
                        <i class='bx bxs-package' style='color: #ff2287;'></i>
                    </a>
                </td>
                <td>
                    <a href='/leverancier-details/$leverancier->id'>
                        <i class='bx bxs-edit' style='color: #ff2287;'></i>
                    </a>
                </td>
                </tr>";
        }


        $data = [
            'title' => 'Leverancier Overzicht',
            'rows' => $rows,
        ];


        return view('leverancier-overzicht', $data);
    }
}
