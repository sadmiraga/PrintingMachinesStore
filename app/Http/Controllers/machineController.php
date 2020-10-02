<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\machine;
use App\picture;

class machineController extends Controller
{




    public function index()
    {
        //get all categories
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();

        //get all subcategories
        $subCategories = DB::table('sub_categories')->orderBy('created_at', 'desc')->get();

        //get all machines
        $machines = DB::table('machines')->orderBy('created_at', 'desc')->get();

        return view('adminPanel.machines.machinesIndex')->with('categories', $categories)
            ->with('subCategories', $subCategories)
            ->with('machines', $machines);
    }

    public function addMachineExe(Request $request)
    {

        //make new machine
        $machine = new machine();

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

        //impresions
        if ($request->input('impresions') > null) {
            $machine->impresions = $request->input('impresions');
        }

        //stock Number
        if ($request->input('stockNumber') != null) {
            $machine->stockNumber = $request->input('stockNumber');
        }


        //Serial Number
        if ($request->input('serialNumber') != null) {
            $machine->serialNumber = $request->input('serialNumber');
        }

        //subCategory ID
        if ($request->input('subCategoryID') == 0) {
            $machine->subCategoryID = null;
        } else {
            $machine->subCategoryID = $request->input('subCategoryID');
        }

        //condition
        $machine->condition = $request->input('condition');

        //price
        $machine->price = $request->input('price');

        //description
        $machine->description = $request->input('description');

        //category
        $machine->categoryID = $request->input('categoryID');

        //add machine to database
        $machine->save();

        //add IMAGES related to added machine
        $images = $request->file('files');
        if ($request->hasFile('files')) {
            foreach ($images as $item) {
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(public_path('images/machines'), $imageName);

                $imageModel = new picture();
                $imageModel->machineID = $machine->id;
                $imageModel->image = $imageName;
                $imageModel->save();
            }
        }


        return redirect('/machines');
    }



    public function delete($machineID)
    {

        $pictures = picture::where('machineID', $machineID)->get();

        //delete pictures from database and from folders
        foreach ($pictures as $picture) {
            $path = public_path() . "/images/machines/" . $picture->image;
            unlink($path);
            $picture->delete();
        }

        //delete machine
        $machine = machine::find($machineID);
        $machine->delete();





        return redirect('/machines');
    }
}
