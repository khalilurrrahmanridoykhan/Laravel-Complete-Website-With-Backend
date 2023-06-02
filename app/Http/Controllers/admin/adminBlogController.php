<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComments;
use App\Models\Blogs;
use App\Models\temp_files_blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class adminBlogController extends Controller
{
    public function index(Request $request)
    {
        $blog = Blogs::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $blog = $blog->where('name', 'like', '%' . $request->keyword . '%');
        }

        $blog = $blog->paginate(15);

        $data['blog'] = $blog;

        return view('blogblades.list', $data);
    }

    public function create(){

        return view('blogblades.create');
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
            $blog = new Blogs();
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                $tempImage = temp_files_blog::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-' . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/blogs/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $blog->img = $newFileName;
                $blog->save();


            }

            $request->session()->get('success', 'blog Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'blog Created Successfully.',
            ]);
        }
    }



    public function edit($id, Request $request)
    {

        $blog = blogs::where('blogs_id', $id)->first();

        if(empty($blog)){
            return redirect()->route('admin.blog.index');
        }

        $data['blog'] =  $blog;

        return view('blogblades.edit', $data);


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
            $blog =  blogs::find($id);

            if(empty($blog)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();


            if ($request->image_id > 0) {
                $tempImage = temp_files_blog::where('id', $request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.', $tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-'.strtotime('now') . $request->image_id . '.' . $ext;

                $sourcePath = './uploads/temp/' . $tempFileName;

                echo "$sourcePath";

                //Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->fit(360, 220);
                $img->save($dPath);

                //Generate large Thumbnail
                $dPath = './uploads/blogs/thumb/large/' . $newFileName;
                $img = ResizeImage::make($sourcePath);
                $img->resize(1150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($dPath);

                $blog->img = $newFileName;
                $blog->save();

                // $request->session()->get('success', 'blog Created Successfully.');
                session()->flash('success', 'Task was successful!');

                return response()->json([
                    'status' => 200,
                    'message' => 'blog Created Successfully.',
                ]);
            }


        }
    }
    public function delete($id,Request $request)
    {
        $blog = blogs::where('blogs_id', $id)->delete();

        if(empty($blog)){
            return redirect()->route('admin.blog.index');
        }else{
            return redirect()->route('admin.blog.index');
        }
    }


    // Comment controller

    public function commentIndex(Request $request){

        $blogcomment = BlogComments::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $blogcomment = $blogcomment->where('name', 'like', '%' . $request->keyword . '%');
        }

        $blogcomment = $blogcomment->paginate(15);



        $data['blogcomment'] = $blogcomment;

        // dd($data);

        return view('blogblades.blogcomment.blogcommentlist', $data);
    }

    public function commentEdit($id, Request $request)
    {

        $blogcomment = BlogComments::where('blog_comments_id', $id)->first();

        if(empty($blogcomment)){
            return redirect()->route('admin.blog.comment');
        }

        $data['blogcomment'] =  $blogcomment;


        return view('blogblades.blogcomment.blogcommentedit', $data);


    }

    public function commentUpdate($id,Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $blogcomment =  BlogComments::find($id);

            if(empty($blogcomment)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $blogcomment->name = $request->name;
            $blogcomment->comment = $request->comment;
            $blogcomment->status = $request->status;
            $blogcomment->save();
        }
    }

    public function commentdelete($id,Request $request)
    {
        $blogcomment = BlogComments::where('blog_comments_id', $id)->delete();

        if(empty($blogcomment)){
            return redirect()->route('admin.blog.comment');
        }else{
            return redirect()->route('admin.blog.comment');
        }
    }

}
