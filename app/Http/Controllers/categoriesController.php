<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('adminPanel.categories.categoriesIndex')->with('categories', $categories);
    }

    //add new category
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

    //delete category
    public function deleteCategory($categoryID)
    {
        //find category
        $category = category::find($categoryID);

        //delete image linked to category
        $path = public_path() . "/images/categories/" . $category->categoryImage;
        unlink($path);

        //delete category
        $category->delete();
        return redirect('/categories');
    }

    public function editCategoryIndex($categoryID)
    {
        $category = category::find($categoryID);
        return view('adminPanel.categories.editCategory')->with('category', $category);
    }

    public function editCategoryExe(Request $request)
    {

        $request->validate([
            'categoryImage'     =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoryName' => 'max:255',
        ]);

        $category = category::find($request->input('categoryID'));

        $category->name = $request->input('categoryName');

        //new image
        //check if user uploaded image
        if ($request->has('categoryImage')) {
            //save name of picture in db
            $imageName = time() . '.' . request()->categoryImage->getClientOriginalExtension();

            //move pic in public/images
            request()->categoryImage->move(public_path('images/categories'), $imageName);
            $category->categoryImage = $imageName;
        }

        $category->save();
        return redirect('/categories');
    }
}
