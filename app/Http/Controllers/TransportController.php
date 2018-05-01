<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Request $params)
    {
        $workshopId = $params['workshop'];

        $cars = DB::table('cars')
            ->where('workshop_id', '=', $workshopId)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year'
            ]);

        $buses = DB::table('buses')
            ->where('workshop_id', '=', $workshopId)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year'
            ]);

        $motorcycles = DB::table('motorcycles')
            ->where('workshop_id', '=', $workshopId)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year'
            ]);

        $transport = $cars
            ->concat($buses)
            ->concat($motorcycles);

        dd($transport);

        return response()->json([
            'transport' => $transport
        ]);
    }
}
