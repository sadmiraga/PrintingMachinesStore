<?php

namespace App\Http\Controllers;

use App\machine;
use App\picture;
use Illuminate\Http\Request;

class uixController extends Controller
{
    public function showMachine($machineID)
    {

        //find mmachine
        $machine = machine::find($machineID);

        $machineImages = picture::where('machineID', $machineID)->get();

        return view('userExperience.machinePage')->with('machine', $machine)->with('pictures', $machineImages);
    }
}
