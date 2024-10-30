<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\positionmodel;

class positioncontroller extends Controller
{
    public function index()
    {
        $positionmodel = positionmodel::all();
        return view('homepage', compact('positionmodel'));
    }
}
