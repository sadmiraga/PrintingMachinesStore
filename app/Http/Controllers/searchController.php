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



    public function filterMachines(Request $request)
    {
        $categories = category::all();
        $subCategories = subCategory::all();
        $pictures = picture::all();

        $sortByFilter = $request->input('sortFilter');
        $categoryFilter = $request->input('categoryID');
        $subCategoryFilter = $request->input('subCategoryID');

        //sortbyFiterValues
        //1= cheapest
        //2= most expensive
        //3 = oldest
        //4 = newest



        //in case user selected both filter
        if ($categoryFilter != 0 and $subCategoryFilter != 0 and $sortByFilter != 0) {

            //get choosen category name to display
            $categoryDisplayModel = category::find($categoryFilter);
            $categoryDisplay = $categoryDisplayModel->name;

            //cheapest
            if ($sortByFilter == 1) {
                $machines = machine::where('categoryID', $categoryFilter)
                    ->where('subCategoryID', $subCategoryFilter)
                    ->orderBy('price', 'asc')
                    ->paginate(15);
            } else if ($sortByFilter == 2) {
                //most expensive
                $machines = machine::where('categoryID', $categoryFilter)
                    ->where('subCategoryID', $subCategoryFilter)
                    ->orderBy('price', 'desc')
                    ->paginate(15);
            } else if ($sortByFilter == 3) {
                //oldest
                $machines = machine::where('categoryID', $categoryFilter)
                    ->where('subCategoryID', $subCategoryFilter)
                    ->orderBy('created_at', 'asc')
                    ->paginate(15);
            } else if ($sortByFilter == 4) {
                $machines = machine::where('categoryID', $categoryFilter)
                    ->where('subCategoryID', $subCategoryFilter)
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);
            }
        } else if ($categoryFilter != 0 and $subCategoryFilter == 0) {
            $machines = machine::where('categoryID', $categoryFilter)
                ->paginate(15);

            //get choosen category name to display
            $categoryDisplayModel = category::find($categoryFilter);
            $categoryDisplay = $categoryDisplayModel->name;
        } else if ($categoryFilter == 0 and $subCategoryFilter == 0 and $sortByFilter != 0) {

            $categoryDisplay = 'All categories';

            $machines = machine::orderBy('created_at', 'desc')->paginate(15);

            //chapest
            if ($sortByFilter == 1) {
                $machines = machine::orderBy('price', 'asc')->paginate(15);
            } else if ($sortByFilter == 2) {
                $machines = machine::orderBy('price', 'desc')->paginate(15);
            } else if ($sortByFilter == 3) {
                $machines = machine::orderBy('created_at', 'asc')->paginate(15);
            } else if ($sortByFilter == 4) {
                $machines = machine::orderBy('created_at', 'desc')->paginate(15);
            }
        } else if ($categoryFilter != 0 and $subCategoryFilter != 0) {

            //get choosen category name to display
            $categoryDisplayModel = category::find($categoryFilter);
            $categoryDisplay = $categoryDisplayModel->name;

            $machines = machine::where('categoryID', $categoryFilter)
                ->where('subCategoryID', $subCategoryFilter)
                ->paginate(15);
        } else if ($categoryFilter == 0 and $subCategoryFilter == 0 and $sortByFilter == 0) {

            $categoryDisplay = 'All categories';

            return redirect('/products');
        }



        return view('userExperience.productPage')->with('categories', $categories)->with('subCategories', $subCategories)
            ->with('pictures', $pictures)->with('machines', $machines)->with('categoryDisplay', $categoryDisplay);
    }



    public function byCategory($categoryID)
    {

        //get neccesary data
        $categories = category::all();
        $subCategories = subCategory::all();
        $pictures = picture::all();

        $categoryDisplayModel = category::find($categoryID);
        $categoryDisplay = $categoryDisplayModel->name;

        $machines = machine::where('categoryID', $categoryID)->paginate(15);
        return view('userExperience.productPage')->with('machines', $machines)
            ->with('categories', $categories)->with('subCategories', $subCategories)
            ->with('pictures', $pictures)
            ->with('categoryDisplay', $categoryDisplay);
    }
}
