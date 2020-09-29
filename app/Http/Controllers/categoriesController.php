<?php

namespace App\Http\Controllers;

use App\category;

use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('adminPanel.categories.categoriesIndex')->with('categories', $categories);
    }

    public function addCategory(Request $request)
    {

        $request->validate([
            'profile_image'     =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoryName' => 'max:255',
        ]);

        $category = new category();
        $category->name = $request->input('categoryName');
        $category->save();
        return redirect()->back();
    }
}
