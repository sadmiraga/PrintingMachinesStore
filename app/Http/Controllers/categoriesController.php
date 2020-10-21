<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index()
    {

        if ($user = Auth::user()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                $categories = category::all();
                return view('adminPanel.categories.categoriesIndex')->with('categories', $categories);
            } else {
                return view('errorPage');
            }
        } else {
            return redirect('/login');
        }
    }

    //add new category
    public function addCategory(Request $request)
    {

        $request->validate(
            [
                'categoryImage'     =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'categoryName' => 'max:255'
            ],
            [
                'categoryImage.required' => 'Prenesite sliko kategorije ',
                'categoryName.required' => 'Vpišite ime Kategorije'
            ]
        );

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

        if ($user = Auth::user()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                //find category
                $category = category::find($categoryID);

                //delete image linked to category
                $path = public_path() . "/images/categories/" . $category->categoryImage;
                unlink($path);



                //delete category
                $category->delete();
                return redirect('/categories');
            } else {
                return view('errorPage');
            }
        } else {
            return redirect('/login');
        }
    }

    public function editCategoryIndex($categoryID)
    {
        if ($user = Auth::user()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                $category = category::find($categoryID);
                return view('adminPanel.categories.editCategory')->with('category', $category);
            } else {
                return view('errorPage');
            }
        } else {
            return redirect('/login');
        }
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
