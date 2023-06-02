<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\temp_files;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image as Image;
use Intervention\Image\Image;
use Intervention\Image\Facades\Image as ResizeImage;
use Intervention\Image\Facades\Image as File;
use Illuminate\Contracts\Session\Session;

class adminServiceController extends Controller
{
    //show all servies
    public function index(Request $request)
    {
        $service = Services::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $service = $service->where('name', 'like', '%' . $request->keyword . '%');
        }

        $service = $service->paginate(15);

        $data['service'] = $service;

        return view('servicelist', $data);
    }

    //Create single services....
    public function create()
    {
        return view('serviseblases.create');
    }
    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $service = new Services();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->short_desc = $request->short_description;
            $service->status = $request->status;
            $service->save();

            if ($request->image_id > 0) {
                $tempImage = temp_files::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'service-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/services/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/services/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $service->img = $newFileName;
                $service->save();


            }

            $request->session()->get('success', 'Service Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'Service Created Successfully.',
            ]);
        }
    }

    public function edit($id, Request $request)
    {

        $service = Services::where('services_id', $id)->first();

        if(empty($service)){
            return redirect()->route('admin.service.index');
        }

        $data['service'] =  $service;

        return view('serviseblases.edit', $data);


    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $service =  Services::find($id);

            if(empty($service)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $service->name = $request->name;
            $service->description = $request->description;
            $service->short_desc = $request->short_description;
            $service->status = $request->status;
            $service->save();


            if ($request->image_id > 0) {
                $tempImage = temp_files::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'service-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/services/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/services/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $service->img = $newFileName;
                $service->save();

                // $request->session()->get('success', 'Service Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'Service Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $service = Services::where('services_id', $id)->delete();

        if(empty($service)){
            return redirect()->route('admin.service.index');
        }else{
            return redirect()->route('admin.service.index');
        }
    }
}
