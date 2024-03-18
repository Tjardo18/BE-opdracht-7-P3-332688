<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeveringController extends Controller
{

    public function __construct()
    {
    }

    public function index($id)
    {
        $result = DB::select('CALL getLeveringen(?)', [$id]);
        $leverancier = DB::select('CALL getLeverancierById(?)', [$id]);

        if (empty($result)) {
            $th = '';
            $rows = "<h1 style='text-align: center'>Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin</h1>";
            header("Refresh: 3; url=/leverancier-overzicht");
        } else {
            $th = "<th>Naam product</th>
        <th>Aantal in magazijn</th>
        <th>Verpakkingseenheid</th>
        <th>Laatste levering</th>
        <th>Nieuwe levering</th>";

            $rows = '';
            foreach ($result as $levering) {
                $rows .= "<tr>
                            <td>$levering->PNaam</td>
                            <td>$levering->AantalAanwezig</td>
                            <td>$levering->VerpakkingsEenheid kg</td>
                            <td>$levering->DatumLevering</td>
                            <td>
                                <a href='/nieuwe-levering/$levering->Pid'>
                                    <i class='bx bx-plus-circle' style='color: #ff2287'></i>
                                </a>
                            </td>
                        </tr>";
            }
        }

        $data = [
            'title' => 'Geleverde Producten',
            'naamLeverancier' => $leverancier[0]->Naam,
            'contactPersoon' => $leverancier[0]->ContactPersoon,
            'leverancierNummer' => $leverancier[0]->leverancierNummer,
            'mobiel' => $leverancier[0]->mobiel,
            'rows' => $rows,
            'th' => $th,
        ];

        return view('leveringen', $data);
    }
}
