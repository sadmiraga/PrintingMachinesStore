<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//models
use App\category;
use App\subCategory;

class subCategoriesController extends Controller
{

    //subcategory index page
    public function index()
    {
        $subCategories = DB::table('sub_categories')->orderBy('created_at', 'desc')->get();
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        return view('adminPanel.subCategories.subCategoriesIndex')->with('categories', $categories)->with('subCategories', $subCategories);
    }


    //add subCategory exe
    public function addSubCategory(Request $request)
    {
        $subCategory = new subCategory();
        $subCategory->name = $request->input('subCategoryName');
        $subCategory->categoryID = $request->input('categoryID');
        $subCategory->save();
        return redirect('/subCategories');
    }

    //edit subCategory index
    public function editSubCategoryIndex($subCategoryID)
    {
        //get all categories
        $categories = category::all();

        //find subCategory
        $subCategory = subCategory::find($subCategoryID);
        return view('adminPanel.subCategories.editSubCategory')->with('subCategory', $subCategory)->with('categories', $categories);
    }

    //edit subCategory exe
    public function editSubCategoryExe(Request $request)
    {

        $subCategory = subCategory::find($request->input('subCategoryID'));

        $subCategory->name = $request->input('subCategoryName');
        $subCategory->categoryID = $request->input('categoryID');
        $subCategory->save();
        return redirect('/subCategories');
    }

    //delete subCategory exe
    public function deleteSubCategory($subCategoryID)
    {
        $subCategory = subCategory::find($subCategoryID);
        $subCategory->delete();
        return redirect('/subCategories');
    }
}
