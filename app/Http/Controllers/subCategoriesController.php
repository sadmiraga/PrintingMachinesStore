<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//models
use App\category;
use App\subCategory;

class subCategoriesController extends Controller
{

    public function index()
    {
        $subCategories = DB::table('sub_categories')->orderBy('created_at', 'desc')->get();
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        return view('adminPanel.subCategories.subCategoriesIndex')->with('categories', $categories)->with('subCategories', $subCategories);
    }


    public function addSubCategory(Request $request)
    {
        $subCategory = new subCategory();
        $subCategory->name = $request->input('subCategoryName');
        $subCategory->categoryID = $request->input('categoryID');
        $subCategory->save();
        return redirect('/subCategories');
    }
}
