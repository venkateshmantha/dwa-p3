<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $session = $request->session();

        return view('card')->with([
            'units' => ['Meter', 'Kilometer', 'Mile', 'Centimeter', 'Millimeter', 'Inch', 'Foot', 'Yard'],
            'from' => $session->get('from'),
            'to' => $session->get('to'),
            'val' => $session->get('val'),
            'roundUp' => $session->get('roundUp'),
            'alert' => $session->get('alert'),
            'res' => $session->get('res'),
            'clear' => $session->get('clear')
        ]);
    }

    public function process(Request $request)
    {
        if ($request->has('clear')) {
            return redirect('/')-> with([
                'val' => ''
            ]);
        } else {
            $from = $request->get('from');
            $to = $request->get('to');
            $val = $request->get('value');
            $roundUp = $request->get('roundUp');

            $request->validate([
                'value' => 'required|numeric|digits_between:0,20'
            ]);

            $res = $this->getResult($from, $to, $val);

            if ($roundUp == 'on') {
                $res = (int)$res;
            }
            $request->flash();
            return redirect('/')->with([
                'from' => $from,
                'to' => $to,
                'val' => $val,
                'res' => $res,
                'alert' => 1,
                'roundUp' => $roundUp,
            ]);
        }
    }

    public function getResult(String $fromUnit, String $toUnit, float $value)
    {
        $baseUnitVal = $this->convertToMeter($fromUnit, $value);
        $convertedVal = $this->getLengthConvert($toUnit, $baseUnitVal);

        return $convertedVal;
    }

    public function convertToMeter(String $fromUnit, float $value)
    {
        $baseval = 0.0;
        switch ($fromUnit) {
            case 'Meter':
                $baseval = $value;
                break;
            case 'Kilometer':
                $baseval = $value * 1000;
                break;
            case 'Mile':
                $baseval = $value * 1609.34;
                break;
            case 'Centimeter':
                $baseval = $value * 0.01;
                break;
            case 'Millimeter':
                $baseval = $value * 0.001;
                break;
            case 'Inch':
                $baseval = $value * 0.0254;
                break;
            case 'Foot':
                $baseval = $value * 0.3048;
                break;
            case 'Yard':
                $baseval = $value * 0.9144;
                break;
        }

        return $baseval;
    }

    public function getLengthConvert(String $toUnit, float $value)
    {
        $conval = 0.0;
        switch ($toUnit) {
            case 'Meter':
                $conval = $value;
                break;
            case 'Kilometer':
                $conval = $value * 0.001;
                break;
            case 'Mile':
                $conval = $value * 0.000621371;
                break;
            case 'Centimeter':
                $conval = $value * 100;
                break;
            case 'Millimeter':
                $conval = $value * 1000;
                break;
            case 'Inch':
                $conval = $value * 39.3701;
                break;
            case 'Foot':
                $conval = $value * 3.28084;
                break;
            case 'Yard':
                $conval = $value * 1.09361;
                break;
        }

        return $conval;
    }
}
