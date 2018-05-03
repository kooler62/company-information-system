<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Request $params)
    {
        $workshops = $params['workshops'];

        $cars = DB::table('cars')
            ->whereIn('workshop_id', $workshops)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        $buses = DB::table('buses')
            ->whereIn('workshop_id', $workshops)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        $motorcycles = DB::table('motorcycles')
            ->whereIn('workshop_id', $workshops)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        $lorries = DB::table('lorries')
            ->whereIn('workshop_id', $workshops)
            ->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        return response()->json([
            'cars' => $cars,
            'buses' => $buses,
            'motorcycles' => $motorcycles,
            'lorries' => $lorries,
        ]);
    }
}
