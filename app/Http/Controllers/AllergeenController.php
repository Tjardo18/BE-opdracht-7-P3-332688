<?php

namespace App\Http\Controllers;

use App\Models\Allergeen;
use Illuminate\Http\Request;

class AllergeenController extends Controller
{
    private $allergieModel;

    public function __construct(Allergeen $allergieModel)
    {
        $this->allergieModel = $allergieModel;
    }

    public function index($id)
    {
        $result = $this->allergieModel->getAllergien($id);
        $product = $this->allergieModel->getProduct($id);

        if ($result->isEmpty()) {
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
