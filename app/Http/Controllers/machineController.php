<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class machineController extends Controller
{

    public function index()
    {

        //get all categories
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();

        //get all subcategories
        $subCategories = DB::table('sub_categories')->orderBy('created_at', 'desc')->get();

        return view('adminPanel.machines.machinesIndex')->with('categories', $categories)->with('subCategories', $subCategories);
    }
}
