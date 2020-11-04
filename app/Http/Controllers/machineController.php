<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\machine;
use App\picture;
use App\subCategory;
use Illuminate\Support\Facades\Auth;
use Redirect;

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

        if ($user = Auth::user()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return view('adminPanel.machines.machinesIndex')->with('categories', $categories)
                    ->with('subCategories', $subCategories)
                    ->with('machines', $machines);
            } else {
                return view('errorPage');
            }
        } else {
            return redirect('/login');
        }
    }

    public function addMachineExe(Request $request)
    {

        //validate form information
        $request->validate([
            'referenceName' => 'required',
        ], [
            'referenceName.required' => 'Bitte geben Sie den Namen als Referenz ein',

        ]);

        //make new machine
        $machine = new machine();

        $machine->name = $request->input('machineName');

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
        if ($request->input('categoryID') == 0) {
            return redirect()->withErrors(['msg', 'Prosim izberite kategorijo']);
        } else {
            $machine->categoryID = $request->input('categoryID');
        }


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

        if ($user = Auth::user()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
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
            } else {
                return view('errorPage');
            }
        } else {
            return redirect('/login');
        }
    }


    //edit machine index
    public function editMachine($machineID)
    {
        //find MACHINE
        $machine = machine::find($machineID);

        //get all categories
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();

        //get all subcategories
        $subCategories = DB::table('sub_categories')->orderBy('created_at', 'desc')->get();

        //get all subcategories from selected category
        $subCategories = subCategory::where('categoryID', $machine->categoryID)->get();

        if ($user = Auth::user()) {
            if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                return view('adminPanel.machines.editMachine')
                    ->with('machine', $machine)->with('categories', $categories)
                    ->with('subCategories', $subCategories);
            } else {
                return view('errorPage');
            }
        } else {
            return redirect('/login');
        }
    }

    //edit machine exe
    public function updateMachine(Request $request)
    {

        //find machine to edit
        $machine = machine::find($request->input('machineID'));

        $machine->name = $request->input('machineName');

        //model
        if ($request->has('machineModel')) {
            $machine->model = $request->input('machineModel');
        }

        //manufacturer
        if ($request->has('manufacturer')) {
            $machine->manufacturer = $request->input('manufacturer');
        }

        //year
        if ($request->has('year')) {
            $machine->year = $request->input('year');
        }

        //numberOfColors
        if ($request->has('numberOfColors')) {
            $machine->numberOfColors = $request->input('numberOfColors');
        }

        //sheetSize
        if ($request->has('sheetSize')) {
            $machine->sheetSize = $request->input('sheetSize');
        }

        //condition
        if ($request->has('condition')) {
            $machine->condition = $request->input('condition');
        }

        //stockNumber
        if ($request->has('stockNumber')) {
            $machine->stockNumber = $request->input('stockNumber');
        }

        //serialNumber
        if ($request->has('serialNumber')) {
            $machine->serialNumber = $request->input('serialNumber');
        }

        //impresions
        if ($request->has('impresions')) {
            $machine->impresions = $request->input('impresions');
        }

        //price
        if ($request->has('price')) {
            $machine->price = $request->input('price');
        }

        //categoryID
        if ($request->has('categoryID')) {
            $machine->categoryID = $request->input('categoryID');
        }

        //subCategoryID
        if ($request->has('subCategoryID')) {
            $machine->subCategoryID = $request->input('subCategoryID');
        }

        $machine->save();
        return redirect('/machines');
    }

    public function editDescriptionIndex($machineID)
    {
        $machine = machine::find($machineID);
        return view('adminPanel.machines.editDescription')->with('machine', $machine);
    }

    public function editDescriptionExe(Request $request)
    {
        $machine = machine::find($request->input('machineID'));
        $machine->description = $request->input('machineDescription');
        $machine->save();
        return redirect('/machines');
    }
}
