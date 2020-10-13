<?php

namespace App\Http\Controllers;

use App\machine;
use App\picture;
use App\category;
use App\subCategory;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function machineSearch(Request $request)
    {
        //get neccesary data
        $categories = category::all();
        $subCategories = subCategory::all();
        $pictures = picture::all();

        $query = $request->get('query');
        $machines = machine::where('name', 'LIKE', "%$query%")->paginate(15);
        return view('userExperience.productPage')->with('machines', $machines)
            ->with('categories', $categories)->with('subCategories', $subCategories)
            ->with('pictures', $pictures);
    }
}
