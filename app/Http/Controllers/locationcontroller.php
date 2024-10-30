<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locationmodel;
use App\Models\positionmodel;

class locationcontroller extends Controller
{
    public function index()
    {
        $locationmodel = locationmodel::all();
        $positionmodel = positionmodel::all();
        return view('homepage', compact('locationmodel', 'positionmodel'));
    }
}
