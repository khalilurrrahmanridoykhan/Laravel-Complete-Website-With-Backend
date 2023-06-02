<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\temp_files;
use Illuminate\Http\Request;

class TempImageController extends Controller
{
    public function upload(Request $request){
        $temp = new temp_files;
        $temp->name = "TEMP VALUE";
        $temp->save(); // This will create a blank entry in DB

        $image = $request->file('file');

        $destinationPath = './uploads/temp/';


        $extenstion = $image-> getClientOriginalExtension();
        $newFileName = $temp->id.'.'.$extenstion;
        $image->move($destinationPath,$newFileName);

        $temp->name = $newFileName;
        $temp->save();

        return response()->json([
            'status' => 200,
            'id' => $temp->id,
            'name' => $newFileName
        ]);

    }

}
