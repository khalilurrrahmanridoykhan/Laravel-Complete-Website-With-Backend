<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\featured_service;
use App\Models\Services;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingContoller extends Controller
{
    // public function indexwithedit(Request $request)
    // {
    //     $validator = validator($request->all(), [
    //         'website_title' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 0,
    //             'errors' => $validator->errors(),
    //         ]);
    //     } else {
    //         $setting = Setting::find(1);

    //         if ($setting == null) {

    //             $setting->website_title = $request->website_title;
    //             $setting->email = $request->email;
    //             $setting->phone = $request->phone;
    //             $setting->facebook_url = $request->facebook_url;
    //             $setting->twiter_url = $request->twiter_url;
    //             $setting->instagram_url = $request->instagram_url;
    //             $setting->contact_card_one = $request->contact_card_one;
    //             $setting->contact_card_two = $request->contact_card_two;
    //             $setting->contact_card_three = $request->contact_card_three;
    //             $setting->save();
    //         } else {
    //             $setting->website_title = $request->website_title;
    //             $setting->email = $request->email;
    //             $setting->phone = $request->phone;
    //             $setting->facebook_url = $request->facebook_url;
    //             $setting->twiter_url = $request->twiter_url;
    //             $setting->instagram_url = $request->instagram_url;
    //             $setting->contact_card_one = $request->contact_card_one;
    //             $setting->contact_card_two = $request->contact_card_two;
    //             $setting->contact_card_three = $request->contact_card_three;
    //             $setting->save();
    //         }

    //         $request->session()->get('success', 'setting Created Successfully.');
    //         session()->flash('success', 'Task was successful!');

    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'setting Created Successfully.',
    //         ]);
    //     }

    //     $data = compact('setting');

    //     return view('setting.list')->with($data);
    // }

    public function indexwithedit(Request $request)
    {
        $setting = DB::table('settings')->first();
        $service = DB::table('services')
            ->orderBy('name', 'asc')
            ->get();
        $featuuredService = DB::table('featured_services')
            ->select('services.name', 'featured_services.*')
            ->leftJoin('services','services_id','featured_services.service_id')
            ->orderBy('sort_order', 'ASC')
            ->get();

        // $service = Services::orderBy('name', 'asc')->get();

        $data = compact('setting');
        $data1 = compact('service');

        return view('setting.create', ['setting' => $setting, 'service' => $service, 'featuuredService' => $featuuredService]);
    }
    public function create()
    {
        return view('setting.create');
    }

    public function save(Request $request)
    {
        $validator = validator($request->all(), [
            'website_title' => 'required',
        ]);

        parse_str($request->ridoyservices, $serviceAppay);

        // dd($serviceAppay);

        if (!empty($serviceAppay['service'])) {
            featured_service::truncate();
            foreach ($serviceAppay['service'] as $key => $service) {
                $featuuredService = new featured_service();
                $featuuredService->service_id = $service;
                $featuuredService->sort_order = $key;
                $featuuredService->save();
            }
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors(),
            ]);
        } else {
            $setting = Setting::find(1);
            $setting->website_title = $request->website_title;
            $setting->email = $request->email;
            $setting->phone = $request->phone;
            $setting->facebook_url = $request->facebook_url;
            $setting->twiter_url = $request->twiter_url;
            $setting->instagram_url = $request->instagram_url;
            $setting->contact_card_one = $request->contact_card_one;
            $setting->contact_card_two = $request->contact_card_two;
            $setting->contact_card_three = $request->contact_card_three;
            $setting->save();

            $request->session()->get('success', 'setting Created Successfully.');
            session()->flash('success', 'Task was successful!');

            return response()->json([
                'status' => 200,
                'message' => 'setting Created Successfully.',
            ]);
        }
    }
}
