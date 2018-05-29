<?php

namespace App\Http\Controllers;

use App\Entity\Engineer;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $engineer = new Engineer();
        $engineers = $engineer
            ->join('workshops', 'engineers.workshop_id', '=', 'workshops.id')
            ->when(isset($request['workshops']), function($q) use($request) {
                $q->whereIn('workshop_id', $request['workshops']);
            })
            ->when(isset($request['categories']), function ($q) use($request) {
                $q->whereIn('category', $request['categories']);
            })->get([
                'engineers.id',
                'first_name',
                'last_name',
                'workshop_name',
                'category',
                'position'
            ]);

        return response()->json([
            'engineers' => $engineers
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMastersList($id)
    {
        $engineer = new Engineer();
        $masters = $engineer
            ->where('workshop_id', '=', $id)
            ->where('position', '=', 'Майстер')
            ->get();

        return response()->json([
            'masters' => $masters
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBossList($id)
    {
        $engineer = new Engineer();
        $bosses = $engineer
            ->where('workshop_id', '=', $id)
            ->whereIn('position', ['Начальник ділянки', 'Начальник цеху'])
            ->get();

        return response()->json([
            'bosses' => $bosses
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $engineer = Engineer::create([
            'first_name'      => $request->input('first_name'),
            'last_name'       => $request->input('last_name'),
            'middle_name'     => $request->input('middle_name'),
            'phone_number'    => $request->input('phone_number'),
            'personal_number' => $request->input('personal_number'),
            'home_address'    => $request->input('home_address'),
            'category'        => $request->input('category'),
            'position'        => $request->input('position'),
            'employment_date' => $request->input('employment_date'),
            'workshop_id'     => $request->input('workshop_id'),
        ]);

        return response()->json([
            'engineer' => $engineer,
            'message' => 'Успішно додано'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Engineer::findOrFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return Engineer::findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $engineer = Engineer::findOrFail($id);
        $engineer->update($request->all());

        return response()->json([
            'Успішно змінено'
        ]);
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        Engineer::findOrFail($id)->delete();
    }
}
