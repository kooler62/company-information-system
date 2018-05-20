<?php

namespace App\Http\Controllers;

use App\Entity\Motorcycle;
use App\Entity\TestLab;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $motorcycle = new Motorcycle();
        $motorcycles = $motorcycle
            ->join('workshops', 'motorcycles.workshop_id', '=', 'workshops.id')
            ->select('motorcycles.*', 'workshops.workshop_name')
            ->get();

        return response()->json([
            'motorcycles' => $motorcycles,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $motorcycle = Motorcycle::create([
            'brand' => $request->input('brand'),
            'body_type' => $request->input('body_type'),
            'engine' => $request->input('engine'),
            'color' => $request->input('color'),
            'transmission' => $request->input('transmission'),
            'production_year' => $request->input('production_year'),
            'stroller' => $request->input('stroller'),
            'make_now' => $request->input('make_now'),
            'workshop_id' => $request->input('workshop_id'),
        ]);

        $motorcycle->setTestLabs($request->input('test_labs'));

        return response()->json([
            'motorcycle' => $motorcycle,
            'message' => 'Успішно додано',
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Motorcycle::findOrFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $mororcycle = Motorcycle::findOrFail($id);
        $testLab = new TestLab();

        $testLabs = $testLab->all();
        $selectedTestLabs = $mororcycle->testLabs->pluck('id')->all();

        return response()->json([
            'motorcycle' => $mororcycle,
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
        $motorcycle = Motorcycle::findOrFail($id);
        $motorcycle->setTestLabs($request->get('selectedTestLabs'));
        $motorcycle->update($request->all());

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
            Motorcycle::findOrFail($id)->delete();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return response()->json([
            'message' => 'Успішно видалено'
        ]);
    }
}
