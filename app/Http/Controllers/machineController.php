<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\machine;

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

    public function addMachineExe(Request $request)
    {
        //validate data
        $request->validate([
            'machineImage'     =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //make new machine
        $machine = new machine();


        // IMAGE check if user uploaded image
        if ($request->has('machineImage')) {
            //save name of picture in db
            $imageName = time() . '.' . request()->machineImage->getClientOriginalExtension();

            //move pic in public/images
            request()->machineImage->move(public_path('images/machines'), $imageName);
            $machine->machineImage = $imageName;
        }

        //MODEL
        if ($request->input('machineModel') != null) {
            $machine->model = $request->input('machineModel');
        }

        //MANUFACTURER
        if ($request->input('manufacturer') != null) {
            $machine->manufacturer = $request->input('manufacturer');
        }

        //YEAR
        if ($request->input('year') != null) {
            $machine->year = $request->input('year');
        }

        //COLORS
        if ($request->input('numberOfColors') > 0) {
            $machine->numberOfColors = $request->input('numberOfColors');
        }

        //SHEETSIZE
        if ($request->input('sheetSize') != null) {
            $machine->sheetSize = $request->input('sheetSize');
        }

        //condition
        $machine->condition = $request->input('condition');


        //impresions
        if ($request->input('impresions') > null) {
            $machine->impresions = $request->input('impresions');
        }



        //subCategory ID
        if ($request->input('subCategoryID') == 0) {
            $machine->subCategoryID = null;
        } else {
            $machine->subCategoryID = $request->input('subCategoryID');
        }


        //stock Number
        if ($request->input('stockNumber') != null) {
            $machine->stockNumber = $request->input('stockNumber');
        }


        //Serial Number
        if ($request->input('serialNumber') != null) {
            $machine->serialNumber = $request->input('serialNumber');
        }

        //price
        $machine->price = $request->input('price');

        //description
        $machine->description = $request->input('description');

        //category
        $machine->categoryID = $request->input('categoryID');

        $machine->save();
        return redirect('/machines');
    }
}
