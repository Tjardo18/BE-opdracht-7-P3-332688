<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Leverancier;
use App\Models\Magazijn;
use App\Models\ProductPerLeverancier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeverancierDetailsController extends Controller
{

    public function __construct()
    {
    }

    public function index($id)
    {
        $result = DB::select('CALL getLeverancierInfo(?)', [$id]);

        $data = [
            'title' => 'Leverancier Details',
            'LId' => $id,
            'CId' => $result[0]->contactId,
            'naam' => $result[0]->Lnaam,
            'contactPersoon' => $result[0]->contactPersoon,
            'leverancierNummer' => $result[0]->leverancierNummer,
            'mobiel' => $result[0]->mobiel,
            'straatnaam' => $result[0]->straat,
            'huisnummer' => $result[0]->huisnummer,
            'postcode' => $result[0]->postcode,
            'stad' => $result[0]->stad,

        ];

        return view('leverancier-details', $data);
    }

    public function store()
    {
        Leverancier::where('id', request('leverancierId'))
            ->update([
                'naam' => request('naam'),
                'contactPersoon' => request('contactPersoon'),
                'leverancierNummer' => request('leverancierNummer'),
                'mobiel' => request('mobiel'),
                'updated_at' => Carbon::now(),
            ]);

        Contact::where('id', request('contactId'))
        ->update([
            'straat' => request('straatnaam'),
            'huisnummer' => request('huisnummer'),
            'postcode' => request('postcode'),
            'stad' => request('stad'),
            'updated_at' => Carbon::now(),
        ]);

        return redirect(route('leverancier-overzicht.index'));
    }
}
