<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComments;
use App\Models\Blogs;
use App\Models\Services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        $service = Services::where('status',1)->orderBy('created_at', 'DESC');

        $service = $service->paginate(6);

        $data['service'] = $service;



        $blog = Blogs::where('status',1)->orderBy('created_at', 'DESC');

        $blog = $blog->paginate(6);

        $data1['blog'] = $blog;

        $blogcomment = new BlogComments();


        // dd($data1);

        return view('fontend.home',$data, $data1);
    }




}
