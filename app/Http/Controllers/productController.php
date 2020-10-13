<?php

namespace App\Http\Controllers;

use App\category;
use App\subCategory;

use Illuminate\Http\Request;

class productController extends Controller
 {
    public function design()
 {
        return view( 'layouts.mainLayout' );
    }

    public function indexDesign()
 {

        //get all categories
        $categories = category::all();

        return view( 'userExperience.indexDesign' )->with( 'categories', $categories );
    }

    public function productPage() {
        $categories = category::all();
        $subCategories = subCategory::all();
        return view( 'userExperience.productPage' )->with( 'categories', $categories )->with( 'subCategories', $subCategories );
    }

    public function adminPanelLayout() {
        return view( 'layouts.adminPanelLayout' );
    }
}