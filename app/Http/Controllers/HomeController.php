<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('card')->with([
            'units' => ['Meter', 'Kilometer', 'Mile', 'Centimeter', 'Millimeter', 'Inch', 'Foot', 'Yard'],
            'roundUp' => 'off',
            'hasErrors' => false,
            'errors' => [],
            'alert' => 0
        ]);
    }

    public function process(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $value = $request->get('value');
        $roundUp = $request->get('roundUp');

        $request->validate([
            'value' => 'required|numeric'
        ]);

        return redirect('/')->with([
            'from' => $from,
            'to' => $to,
            'value' => $value
        ]);
    }
}
