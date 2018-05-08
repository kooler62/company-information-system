<?php

namespace App\Http\Controllers;

use App\Entity\Engineer;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    public function index()
    {
        $engineers = Engineer::all();
        return response()->json([
            'engineers' => $engineers
        ]);
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        return Engineer::findOrFail($id);
    }

    public function show($id)
    {
        return Engineer::findOrFail($id);
    }

    public function update()
    {

    }

    public function destroy($id)
    {
        Engineer::findOrFail($id)->delete();
    }
}
