<?php

namespace App\Http\Controllers;

use App\Entity\Lorry;
use App\Entity\TestLab;
use Illuminate\Http\Request;

class LorryController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $lorry = new Lorry();
        $lorries = $lorry
            ->join('workshops', 'lorries.workshop_id', '=', 'workshops.id')
            ->select('lorries.*', 'workshops.workshop_name')
            ->get();

        return response()->json([
            'lorries' => $lorries,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $lorries = Lorry::create([
            'brand' => $request->input('brand'),
            'engine' => $request->input('engine'),
            'color' => $request->input('color'),
            'transmission' => $request->input('transmission'),
            'production_year' => $request->input('production_year'),
            'wheel' => $request->input('wheel'),
            'dump_truck' => $request->input('dump_truck'),
            'carrying' => $request->input('carrying'),
            'make_now' => $request->input('make_now'),
            'workshop_id' => $request->input('workshop_id'),
        ]);

        $lorries->setTestLabs($request->input('test_labs'));

        return response()->json([
            'lorries' => $lorries,
            'message' => 'Успішно додано',
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Lorry::findOrFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $lorry = Lorry::findOrFail($id);
        $testLab = new TestLab();

        $testLabs = $testLab->all();
        $selectedTestLabs = $lorry->testLabs->pluck('id')->all();

        return response()->json([
            'lorry' => $lorry,
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
        $lorry = Lorry::findOrFail($id);
        $lorry->setTestLabs($request->get('selectedTestLabs'));
        $lorry->update($request->all());

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
            Lorry::findOrFail($id)->delete();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return response()->json([
            'message' => 'Успішно видалено'
        ]);
    }
}
