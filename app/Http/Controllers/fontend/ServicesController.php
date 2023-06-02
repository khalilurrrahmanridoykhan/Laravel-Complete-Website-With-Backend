<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Request $request){


        $service = Services::where('status',1)->orderBy('created_at', 'DESC')->get();

        $data['service'] = $service;


        $blog = Blogs::where('status',1)->orderBy('created_at', 'DESC');

        $blog = $blog->paginate(6);

        $data1['blog'] = $blog;

        return view('fontend.service', $data, $data1);
    }


    public function detail($id){

        $service = Services::where('services_id', $id)->get();

        if(empty($service)){
            return redirect('/');
        }

        $data['service'] = $service;

        // dd($service);


        $blog = Blogs::where('status',1)->orderBy('created_at', 'DESC');


        $blog = $blog->paginate(6);

        $data1['blog'] = $blog;

        return view('fontend.service-detail',$data, $data1);
    }
}
