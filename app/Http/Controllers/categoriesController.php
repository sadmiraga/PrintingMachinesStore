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
            'categoryImage'     =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoryName' => 'max:255',
        ]);

        //create new category
        $category = new category();


        //check if user uploaded image
        if ($request->has('categoryImage')) {



            //save name of picture in db
            $imageName = time() . '.' . request()->categoryImage->getClientOriginalExtension();

            //move pic in public/images
            request()->categoryImage->move(public_path('images/categories'), $imageName);
            $category->categoryImage = $imageName;
        }


        $category->name = $request->input('categoryName');
        $category->save();
        return redirect('/categories');
    }
}
