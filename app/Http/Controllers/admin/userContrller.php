<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userContrller extends Controller
{
    public function index(Request $request)
    {
        $user = user::orderBy('created_at', 'DESC')->get();

        // dd($user);

        if (!empty($request->keyword)) {
            $user = $user->where('name', 'like', '%' . $request->keyword . '%');
        }

        // $user = $user->paginate(15);

        $data['user'] = $user;

        return view('users.userslist', $data);
    }


    public function edit($id, Request $request)
    {

        $user = user::where('id', $id)->first();

        if(empty($user)){
            return redirect()->route('admin.user.index');
        }

        $data['user'] =  $user;

        return view('users.edit', $data);


    }
    public function update($id,Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $user =  user::find($id);

            if(empty($user)){
                return response()->json([
                    'status' => 0,
                ]);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_admin = $request->is_admin;
            $user->save();


            // if ($request->image_id > 0) {
            //     $tempImage = temp_files_user::where('id', $request->image_id)->first();
            //     $tempFileName = $tempImage->name;
            //     $imageArray = explode('.', $tempFileName);
            //     $ext = end($imageArray);

            //     $newFileName = 'user-'.strtotime('now') . $request->image_id . '.' . $ext;

            //     $sourcePath = './uploads/temp/' . $tempFileName;

            //     echo "$sourcePath";

            //     //Generate Small Thumbnail
            //     $dPath = './uploads/users/thumb/small/' . $newFileName;
            //     $img = ResizeImage::make($sourcePath);
            //     $img->fit(360, 220);
            //     $img->save($dPath);

            //     //Generate large Thumbnail
            //     $dPath = './uploads/users/thumb/large/' . $newFileName;
            //     $img = ResizeImage::make($sourcePath);
            //     $img->resize(1150, null, function ($constraint) {
            //         $constraint->aspectRatio();
            //     });
            //     $img->save($dPath);

            //     $user->img = $newFileName;
            //     $user->save();

            //     // $request->session()->get('success', 'user Created Successfully.');
            //     session()->flash('success', 'Task was successful!');

            //     return response()->json([
            //         'status' => 200,
            //         'message' => 'user Created Successfully.',
            //     ]);
            // }


        }
    }
    public function delete($id,Request $request)
    {
        $user = user::where('id', $id)->delete();

        if(empty($user)){
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->route('admin.user.index');
        }
    }
}
