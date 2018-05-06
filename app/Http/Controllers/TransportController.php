<?php

namespace App\Http\Controllers;

use App\Entity\Bus;
use App\Entity\Car;
use App\Entity\Lorry;
use App\Entity\Motorcycle;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Request $request)
    {
        $car = new Car();
        $bus = new Bus();
        $lorry = new Lorry();
        $motorcycle = new Motorcycle();

        $dates = [$request['dateStart'], $request['dateEnd']];

        $cars = $car
            ->whereIn('workshop_id', $request['workshops'])
            ->where('make_now', $request->input('makeNow'))
            ->when(isset($request['dateStart']), function($q) use($dates) {
                return $q->whereBetween('production_year', $dates);
            })->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        $buses = $bus
            ->whereIn('workshop_id', $request['workshops'])
            ->where('make_now', $request->input('makeNow'))
            ->when(isset($request['dateStart']), function($q) use($dates) {
                return $q->whereBetween('production_year', $dates);
            })->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        $motorcycles = $motorcycle
            ->whereIn('workshop_id', $request['workshops'])
            ->where('make_now', $request->input('makeNow'))
            ->when(isset($request['dateStart']), function($q) use($dates) {
                return $q->whereBetween('production_year', $dates);
            })->get([
                'brand',
                'engine',
                'color',
                'production_year',
                'workshop_id'
            ]);

        $lorries = $lorry
            ->whereIn('workshop_id', $request['workshops'])
            ->where('make_now', $request->input('makeNow'))
            ->when(isset($request['dateStart']), function($q) use($dates) {
                return $q->whereBetween('production_year', $dates);
            })->get([
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
            'lorries' => $lorries
        ]);
    }
}
