<?php

namespace App\Http\Controllers;

use App\Entity\Car;
use DateTime;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $car = new Car();

        $cars = $car
            ->join('workshops', 'cars.workshop_id', '=', 'workshops.id')
            ->select('cars.*', 'workshops.workshop_name')
            ->get();

        foreach ($cars as $car) {
            $car['production_year'] = DateTime::createFromFormat('Y-m-d', $car['production_year'])
                ->format('d-m-Y');
        }

        return response()->json([
            'cars' => $cars,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $car = Car::create([
            'brand' => $request->input('brand'),
            'body_type' => $request->input('body_type'),
            'engine' => $request->input('engine'),
            'color' => $request->input('color'),
            'transmission' => $request->input('transmission'),
            'production_year' => DateTime::createFromFormat('d-m-Y',
                $request->input('production_year'))->format('Y-m-d'),
            'man_capacity' => $request->input('man_capacity'),
            'make_now' => $request->input('make_now'),
            'workshop_id' => $request->input('workshop_id'),
        ]);

        return response()->json([
            'car' => $car,
            'message' => 'Успішно додано',
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $car['production_year'] = DateTime::createFromFormat('Y-m-d',
            $car['production_year'])->format('d-m-Y');
        return $car;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        $car['production_year'] = DateTime::createFromFormat('Y-m-d',
            $car['production_year'])->format('d-m-Y');
        return $car;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $request['production_year'] = DateTime::createFromFormat('d-m-Y',
            $request['production_year'])->format('Y-m-d');
        $car->update($request->all());

        return response()->json([
            'message' => 'Успішно змінено'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            Car::findOrFail($id)->delete();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return response()->json([
            'message' => 'Успішно видалено'
        ]);
    }
}
