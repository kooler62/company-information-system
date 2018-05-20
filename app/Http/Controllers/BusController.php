<?php

namespace App\Http\Controllers;

use App\Entity\Bus;
use App\Entity\TestLab;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $bus = new Bus();
        $buses = $bus
            ->join('workshops', 'buses.workshop_id', '=', 'workshops.id')
            ->select('buses.*', 'workshops.workshop_name')
            ->get();

        return response()->json([
            'buses' => $buses,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $bus = Bus::create([
            'brand' => $request->input('brand'),
            'engine' => $request->input('engine'),
            'color' => $request->input('color'),
            'transmission' => $request->input('transmission'),
            'production_year' => $request->input('production_year'),
            'man_capacity' => $request->input('man_capacity'),
            'make_now' => $request->input('make_now'),
            'workshop_id' => $request->input('workshop_id'),
        ]);

        $bus->setTestLabs($request->input('test_labs'));

        return response()->json([
            'bus' => $bus,
            'message' => 'Успішно додано',
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Bus::findOrFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $bus = Bus::findOrFail($id);
        $testLab = new TestLab();

        $testLabs = $testLab->all();
        $selectedTestLabs = $bus->testLabs->pluck('id')->all();

        return response()->json([
            'bus' => $bus,
            'testLabs' => $testLabs,
            'selectedTestLabs' => $selectedTestLabs
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);
        $bus->setTestLabs($request->get('selectedTestLabs'));
        $bus->update($request->all());

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
            Bus::findOrFail($id)->delete();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return response()->json([
            'message' => 'Успішно видалено'
        ]);
    }

    public function getTestLabs($id)
    {
        $bus = Bus::findOrFail($id);
        $testLabs = $bus->testLabs;

        return response()->json([
            'testLabs' => $testLabs
        ]);
    }
}
