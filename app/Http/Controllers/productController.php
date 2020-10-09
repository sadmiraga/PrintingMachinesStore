<?php

namespace App\Http\Controllers;

use App\category;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function design()
    {
        return view('layouts.mainLayout');
    }

    public function indexDesign()
    {

        //get all categories
        $categories = category::all();

        return view('layouts.indexDesign')->with('categories', $categories);
    }
}
