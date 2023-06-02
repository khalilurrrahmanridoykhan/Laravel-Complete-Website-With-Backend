<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Http\Request;

class adminFaqController extends Controller
{
    public function index(Request $request){

        $faq = Faq::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $faq = $faq->where('title', 'like', '%' . $request->keyword . '%');
        }

        $faq = $faq->paginate(15);

        $data = compact('faq');

        return view('faqblades.list')->with($data);
    }

    public function create(){
        return view('faqblades.create');
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
            $faq = new Faq();
            $faq->title = $request->title;
            $faq->description = $request->description;
            $faq->status = $request->status;
            $faq->save();


            $request->session()->get('success', 'faq Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'faq Created Successfully.',
            ]);
        }
    }

    public function edit($id){

        $faq = Faq::where('faq_id', $id)->first();

        if(empty($faq)){
            return redirect()->route('admin.faq.index');
        }

        $data = compact('faq');

        return view('faqblades.edit' , $data);
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
            $faq =  Faq::find($id);

            if(empty($faq)){
                return response()->json([
                    'status' => 0,
                ]);
            }
            $faq->title = $request->title;
            $faq->description = $request->description;
            $faq->status = $request->status;
            $faq->save();


            $request->session()->get('success', 'faq Created Successfully.');
            session()->flash('success', 'Task was successful!');


            return response()->json([
                'status' => 200,
                'message' => 'faq Created Successfully.',
            ]);
        }
    }

    public function delete($id, Request $request){

        $faq = Faq::where('faq_id',$id)->delete();
        if(empty($faq)){

            return redirect()->route('admin.faq.index');
        }else{
            return redirect()->route('admin.faq.index');
        }

    }

}
