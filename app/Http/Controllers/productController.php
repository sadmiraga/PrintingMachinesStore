<?php

namespace App\Http\Controllers;

use App\category;
use App\subCategory;
use App\machine;
use App\picture;
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

        return view('userExperience.indexDesign')->with('categories', $categories);
    }

    public function productPage()
    {
        $categories = category::all();
        $subCategories = subCategory::all();
        $pictures = picture::all();
        $machines = machine::orderBy('created_at', 'desc')->paginate(15);
        return view('userExperience.productPage')->with('categories', $categories)->with('subCategories', $subCategories)
            ->with('pictures', $pictures)->with('machines', $machines);
    }

    public function showMachineInfo($machineID)
    {
        return 'eto ti kurac';
    }
}
