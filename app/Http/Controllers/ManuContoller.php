<?php

namespace App\Http\Controllers;

use App\Models\Manulink;
use App\Models\ManuSortable;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManuContoller extends Controller
{
    public function index(Request $request){

        $pagelinks = DB::table('manulinks')->get();
        $manu_sortables = DB::table('manu_sortables')->select('manulinks.page_name', 'manu_sortables.*')
        ->leftJoin('manulinks','manulinks_id','manu_sortables.manulink_id')
        ->orderBy('sort_order', 'ASC')->get();

        // dd($manu_sortables);

        return view('fontend.manu.manuindex',['pagelinks'=> $pagelinks, 'manu_sortables' => $manu_sortables] );
    }

    public function create(){
        return view('fontend.manu.manucreate');
    }

    public function save(Request $request){


        $validator = validator($request ->all(),[

            'name' => 'required',
            'link' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $manulinks = new Manulink();
            $manulinks-> page_name = $request->name;
            $manulinks-> page_link = $request->link;
            $manulinks-> dropdown = $request->dropdown;
            $manulinks->save();

            $request->session()->get('success', 'Page Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'page Created Successfully.',
            ]);
        }
    }

    public function delete($id, Request $request){

        $manulinks = Manulink::where('manulinks_id', $id)->delete();

        if(empty($manulinks)){
            return redirect()->route('admin.manu.list');
        }else{
            return redirect()->route('admin.manu.list');
        }
    }

    public function savesorted(Request $request){

        parse_str($request->ridoyservices, $manuAppay);

        // dd($manuAppay);

        if (!empty($manuAppay['service'])) {
            ManuSortable::truncate();
            foreach ($manuAppay['service'] as $key => $service) {
                $manuSortables = new ManuSortable();
                $manuSortables->manulink_id = $service;
                $manuSortables->sort_order = $key;
                $manuSortables->save();
            }
        }

    }
}
