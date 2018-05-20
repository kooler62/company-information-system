<?php

namespace App\Http\Controllers;

use App\Entity\Bus;
use App\Entity\Car;
use App\Entity\Lorry;
use App\Entity\Motorcycle;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    private $car;
    private $bus;
    private $lorry;
    private $motorcycle;

    /**
     * TransportController constructor.
     */
    public function __construct()
    {
        $this->car = new Car();
        $this->bus = new Bus();
        $this->lorry = new Lorry();
        $this->motorcycle = new Motorcycle();
    }

    public function index(Request $request)
    {
        $dates = [$request['dateStart'], $request['dateEnd']];

        $cars = $this->car
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

        $buses = $this->bus
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

        $motorcycles = $this->motorcycle
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

        $lorries = $this->lorry
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

    public function getTransportByTestLabs(Request $request)
    {
        $testLabsIds = $request['testLabs'];

        $cars = Car::whereHas('testLabs', function ($q) use ($testLabsIds) {
            $q->whereIn('car_id', $testLabsIds);
        })->get();

        $buses = Car::whereHas('testLabs', function ($q) use ($testLabsIds) {
            $q->whereIn('car_id', $testLabsIds);
        })->get();

        $motorcycles = Car::whereHas('testLabs', function ($q) use ($testLabsIds) {
            $q->whereIn('car_id', $testLabsIds);
        })->get();

        $lorries = Car::whereHas('testLabs', function ($q) use ($testLabsIds) {
            $q->whereIn('car_id', $testLabsIds);
        })->get();

        return response()->json([
            'cars' => $cars,
            'buses' => $buses,
            'motorcycles' => $motorcycles,
            'lorries' => $lorries
        ]);
    }
}
