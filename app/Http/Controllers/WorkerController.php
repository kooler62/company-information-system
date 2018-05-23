<?php

namespace App\Http\Controllers;

use App\Entity\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workshops = $request['workshops'];
        $categories = $request['categories'];
        $brigade = $request['brigade'];

        $worker = new Worker();

        $workers = $worker
            ->when(isset($workshops), function ($q) use ($workshops) {
                return $q->whereIn('workshop_id', $workshops);
            })
            ->when(isset($categories), function ($q) use ($categories) {
                return $q->whereIn('category', $categories);
            })
            ->when(isset($brigade), function ($q) use ($brigade) {
                return $q->where('brigade_id', $brigade);
            })->get();

        foreach ($workers as $worker) {
            $worker['workshop_name'] = $worker->workshop->workshop_name;
            $worker['brigade_name'] = $worker->brigade->brigade_name;
        }

        return response()->json([
            'workers' => $workers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $worker = Worker::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'phone_number' => $request->input('phone_number'),
            'personal_number' => $request->input('personal_number'),
            'home_address' => $request->input('home_address'),
            'category' => $request->input('category'),
            'is_brigadier' => $request->input('is_brigadier'),
            'employment_date' => $request->input('employment_date'),
            'brigade_id' => $request->input('brigade_id'),
            'workshop_id' => $request->input('workshop_id'),
        ]);

        return response()->json([
            'worker' => $worker,
            'message' => 'Успішно додано',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return Worker::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Worker::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function update(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->update($request->all());

        return response()->json([
            'Успішно змінено'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     * @throws \Exception
     */
    public function destroy($id)
    {
        Worker::findOrFail($id)->delete();
    }
}
