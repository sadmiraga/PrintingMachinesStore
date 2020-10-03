<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\picture;

use function Symfony\Component\String\b;

class pictureController extends Controller
{
    public function machineImages($machineID)
    {
        $pictures = picture::where('machineID', $machineID)->get();
        return view('adminPanel.machines.machineImages')->with('pictures', $pictures)->with('machineID', $machineID);
    }

    public function deleteImage($imageID)
    {

        $picture = picture::find($imageID);

        //delete image from folder
        $path = public_path() . "/images/machines/" . $picture->image;
        unlink($path);

        //delete image from database
        $picture->delete();
        return redirect()->back();
    }

    public function addImageToMachine(Request $request)
    {

        $machineID = $request->input('machineID');

        //add IMAGES related to added machine
        $images = $request->file('files');
        if ($request->hasFile('files')) {
            foreach ($images as $item) {
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(public_path('images/machines'), $imageName);

                $imageModel = new picture();
                $imageModel->machineID = $machineID;
                $imageModel->image = $imageName;
                $imageModel->save();
            }
        }

        return redirect("/machineImages/$machineID");
    }
}
