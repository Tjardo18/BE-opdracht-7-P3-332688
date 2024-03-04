<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Illuminate\Http\Request;

class OverzichtLeverancierController extends Controller
{
    private $leverancierModel;

    public function __construct(Leverancier $leverancierModel)
    {
        $this->leverancierModel = $leverancierModel;
    }

    public function index()
    {
        $result = $this->leverancierModel->getLeverancierIndividual();

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
                </tr>";
        }


        $data = [
            'title' => 'Leverancier Overzicht',
            'rows' => $rows,
        ];


        return view('leverancier-overzicht', $data);
    }
}
