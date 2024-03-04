<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overzicht;

class OverzichtController extends Controller
{
    private $overzichtModel;

    public function __construct(Overzicht $overzichtModel)
    {
        $this->overzichtModel = $overzichtModel;
    }

    public function index()
    {
        $result = $this->overzichtModel->getOverzicht();

        $rows = "";
        foreach ($result as $overzicht) {
            $rows .= "<tr>
                         <td>$overzicht->Barcode</td>
                         <td>$overzicht->Naam</td>
                         <td>$overzicht->VerpakkingsEenheid</td>
                         <td>$overzicht->AantalAanwezig</td>
                         <td>
                             <a href='allergie/{$overzicht->Id}'>
                                 <i class='fa-solid fa-xmark' style='color: #ff0000;'></i>
                             </a>
                         </td>
                         <td>
                             <a href='leverancier/{$overzicht->Id}'>
                                 <i class='fa-solid fa-question' style='color: #0000ff;'></i>
                             </a>
                         </td>
                     </tr>";
        }

        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'rows' => $rows
        ];

        return view('overzicht', $data);
    }
}
