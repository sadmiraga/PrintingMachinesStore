<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//models
use App\category;
use App\subCategory;

class subCategoriesController extends Controller
 {

    //dynamic dropdown

    public function getSubCategories( Request $request )
 {
        $subCategories = DB::table( 'sub_categories' )
        ->where( 'categoryID', $request->categoryID )
        ->pluck( 'name', 'id' );
        return response()->json( $subCategories );
    }

    //subcategory index page

    public function index()
 {
        $subCategories = DB::table( 'sub_categories' )->orderBy( 'created_at', 'desc' )->get();
        $categories = DB::table( 'categories' )->orderBy( 'created_at', 'desc' )->get();

        if ( $user = Auth::user() ) {
            if ( Auth::user()->role == 1 || Auth::user()->role == 2 ) {
                return view( 'adminPanel.subCategories.subCategoriesIndex' )->with( 'categories', $categories )->with( 'subCategories', $subCategories );
            } else {
                return view( 'errorPage' );
            }
        } else {
            return redirect( '/login' );
        }
    }

    //add subCategory exe

    public function addSubCategory( Request $request )
 {
        $subCategory = new subCategory();
        $subCategory->name = $request->input( 'subCategoryName' );
        $subCategory->categoryID = $request->input( 'categoryID' );
        $subCategory->save();
        return redirect( '/subCategories' );
    }

    //edit subCategory index

    public function editSubCategoryIndex( $subCategoryID )
 {
        //get all categories
        $categories = category::all();

        //find subCategory
        $subCategory = subCategory::find( $subCategoryID );

        if ( $user = Auth::user() ) {
            if ( Auth::user()->role == 1 || Auth::user()->role == 2 ) {
                return view( 'adminPanel.subCategories.editSubCategory' )
                ->with( 'subCategory', $subCategory )
                ->with( 'categories', $categories );
            } else {
                return view( 'errorPage' );
            }
        } else {
            return redirect( '/login' );
        }
    }

    //edit subCategory exe

    public function editSubCategoryExe( Request $request )
 {

        $subCategory = subCategory::find( $request->input( 'subCategoryID' ) );

        $subCategory->name = $request->input( 'subCategoryName' );
        $subCategory->categoryID = $request->input( 'categoryID' );
        $subCategory->save();
        return redirect( '/subCategories' );
    }

    //delete subCategory exe

    public function deleteSubCategory( $subCategoryID )
 {

        if ( $user = Auth::user() ) {
            if ( Auth::user()->role == 1 || Auth::user()->role == 2 ) {
                $subCategory = subCategory::find( $subCategoryID );
                $subCategory->delete();
                return redirect( '/subCategories' );
            } else {
                return view( 'errorPage' );
            }
        } else {
            return redirect( '/login' );
        }
    }
}