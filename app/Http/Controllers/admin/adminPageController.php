<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\temp_files_blog;
use App\Models\temp_files_page;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class adminPageController extends Controller
{
    public function index(Request $request)
    {
        $page = page::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $page = $page->where('title', 'like', '%' . $request->keyword . '%');
        }

        $page = $page->paginate(15);

        $data['page'] = $page;

        return view('pages.list', $data);
    }

    public function create(){

        return view('pages.create');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $page = new page();
            $page->title = $request->title;
            $page->description = $request->description;
            $page->status = $request->status;
            $page->save();

            if ($request->image_id > 0) {
                $tempImage = temp_files_page::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'page-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/pages/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/pages/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $page->img = $newFileName;
                $page->save();


            }

            $request->session()->get('success', 'page Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'page Created Successfully.',
            ]);
        }
    }



    public function edit($id, Request $request)
    {

        $page = page::where('page_id', $id)->first();

        if(empty($page)){
            return redirect()->route('admin.page.index');
        }

        $data['page'] =  $page;

        return view('pages.edit', $data);


    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'title' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $page = Page::find($id);
            $page->title = $request->title;
            $page->description = $request->description;
            $page->status = $request->status;
            $page->save();

            if ($request->image_id > 0) {
                $tempImage = temp_files_page::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'page-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/pages/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/pages/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $page->img = $newFileName;
                $page->save();


            }

            $request->session()->get('success', 'page Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'page Created Successfully.',
            ]);
        }
    }
    public function delete($id,Request $request)
    {
        $page = page::where('page_id', $id)->delete();

        if(empty($page)){
            return redirect()->route('admin.page.index');
        }else{
            return redirect()->route('admin.page.index');
        }
    }

}
