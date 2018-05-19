<?php

namespace App\Http\Controllers;

use App\Entity\TestLab;
use Illuminate\Http\Request;

class TestLabsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $testLabs = TestLab::all();

        return response()->json([
            'testLabs' => $testLabs
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $testLab = TestLab::create([
            'name' => $request->input('name')
        ]);

        return response()->json([
            'testLab' => $testLab,
            'message' => 'Успішно додано'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function edit($id)
    {
        return TestLab::findOrFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return TestLab::findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        TestLab::findOrFail($id)->update($request->all());
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        TestLab::findOrFail($id)->delete();
    }
}
