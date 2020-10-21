<?php

namespace App\Http\Controllers;

use App\category;
use App\subCategory;
use App\machine;
use App\picture;
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

    public function productPage()
 {
        $categories = category::all();
        $subCategories = subCategory::all();
        $pictures = picture::all();
        $machines = machine::orderBy( 'created_at', 'desc' )->paginate( 15 );
        return view( 'userExperience.productPage' )->with( 'categories', $categories )->with( 'subCategories', $subCategories )
        ->with( 'pictures', $pictures )->with( 'machines', $machines );
    }

    public function showMachineInfo( $machineID )
 {
        $machine = machine::find( $machineID );
        $pictures = picture::where( 'machineID', $machineID )->get();

        //get category Name for product
        $category = category::find( $machine->categoryID );
        $categoryName = $category->name;

        //get subCategory nane for product

        if ( $machine->subCategoryID != null ) {
            $subCategory = subCategory::find( $machine->subCategoryID );
            $subCategoryName = $subCategory->name;

            return view( 'userExperience.showProductInfo' )->with( 'machine', $machine )->with( 'pictures', $pictures )
            ->with( 'categoryName', $categoryName )->with( 'subCategoryName', $subCategoryName );
        }

        return view( 'userExperience.showProductInfo' )->with( 'machine', $machine )->with( 'pictures', $pictures )
        ->with( 'categoryName', $categoryName );
    }

    public function contactPage()
 {
        return view( 'userExperience.contactPage' );
    }

    public function aboutPage()
 {
        return view( 'userExperience.aboutPage' );
    }
}