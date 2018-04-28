<?php

namespace App\Http\Controllers;

use App\Entity\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $workshops = Workshop::all();
        return response()->json([
            'workshops' => $workshops
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $workshop = Workshop::create([
            'workshop_name' => $request->input('workshop_name'),
        ]);

        return response()->json([
            'workshop' => $workshop,
            'message' => 'Успішно додано',
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Workshop::findOrFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return Workshop::findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->update($request->all());

        return response()->json([
            'message' => 'Успішно змінено'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Workshop::findOrFail($id)->delete();

        return response()->json([
            'message' => 'успішно видалено'
        ]);
    }
}
