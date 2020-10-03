<?php

namespace App\Http\Controllers;

use App\machine;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function machineSearch(Request $request)
    {
        $query = $request->get('query');
        $resultMachines = machine::where('name', 'LIKE', "%$query%")->get();
        return view('adminPanel.index')->with('resultMachines', $resultMachines);
    }
}
