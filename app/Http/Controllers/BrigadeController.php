<?php

namespace App\Http\Controllers;

use App\Entity\Brigade;
use Illuminate\Http\Request;

class BrigadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brigades = Brigade::all();

        return response()->json([
            'brigades' => $brigades
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
        $brigade = Brigade::create([
            'brigade_name' => $request->input('brigade_name')
        ]);

        return response()->json([
            'brigade' => $brigade,
            'message' => 'Успішно додано'
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
        return Brigade::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return Brigade::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brigade = Brigade::findOrFail($id);
        $brigade->update($request->all());

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
        Brigade::findOrFail($id)->delete();
    }
}
