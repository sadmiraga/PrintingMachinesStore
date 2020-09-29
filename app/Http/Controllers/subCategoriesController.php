<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//models
use App\category;

class subCategoriesController extends Controller
{

    public function index()
    {
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        return view('adminPanel.subCategories.subCategoriesIndex')->with('categories', $categories);
    }
}
