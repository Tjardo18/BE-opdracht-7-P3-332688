<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllergeenController extends Controller
{
    public function __construct()
    {
    }

    public function index($id)
    {
        $result = DB::select('CALL getAllergien(?)', [$id]);
        $product = DB::select('CALL getProduct(?)', [$id]);

        if (empty($result)) {
            $th = '';
            $rows = "<h1 style='text-align: center'>In dit product zitten geen stoffen die een<br>allergische reactie kan veroorzaken</h1>";
            header("Refresh: 4; url=/overzicht");
        } else {
            $th = "<th>Naam</th>
            <th>Omschrijving</th>";

            $rows = '';
            foreach ($result as $allergien) {
                $rows .= "<tr>
                            <td>$allergien->ANaam</td>
                            <td>$allergien->omschrijving</td>
                        </tr>";
            }
        }

        $data = [
            'title' => 'Overzicht Allergenen',
            'naamProduct' => $product[0]->PNaam,
            'barcode' => $product[0]->barcode,
            'rows' => $rows,
            'th' => $th,
        ];

        return view('allergie', $data);
    }
}
