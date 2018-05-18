<?php

namespace App\Http\Controllers;

use App\Entity\TestLab;
use Illuminate\Http\Request;

class TestLabsController extends Controller
{
    public function index()
    {
        $testLabs = TestLab::all();

        return response()->json([
            'testLabs' => $testLabs
        ]);
    }
}
