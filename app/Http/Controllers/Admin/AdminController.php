<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\user;
use App\Models\Setting;
use Hash;
use File;

class AdminController extends Controller
{
    public function login()
    {
        //dd("fasasd");
        $data = [
            'category_name' => 'auth',
            'page_name' => 'auth_default',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        return view('admin.auth_login')->with($data);
    }

    public function postLogin()
    {
        if (Auth::attempt(['name' => request('name'), 'password' => request('password')])) {
            return redirect('dashboard');
        }


        return back()->with('authorize', 'invalid username or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function index()
    {
        $data = [
          'category_name' => 'dashboard',
          'page_name' => 'analytics',
          'has_scrollspy' => 0,
          'scrollspy_offset' => '',
      ];
        // $pageName = 'analytics';
        return view('admin.index')->with($data);
    }


    public function rules()
    {
        if (isset(Setting::where('key', 'rules')->first()->value)) {
            $data['rules'] = Setting::where('key', 'rules')->first();
            $data['aboutus'] = Setting::where('key', 'aboutus')->first();
            $data['email'] = Setting::where('key', 'email')->first();
            $data['phone'] = Setting::where('key', 'phone')->first();
        //dd($data);
        } else {
            $data['rules'] = "";
            $data['aboutus'] = "";
            $data['email'] = "";
            $data['phone'] = "";
        }
//            dd($data);

        return view('admin.pages.rules', compact('data'));
    }

    public function updateRules()
    {
        $data = request()->get('data');
        //dd($data);

        foreach ($data as $key => $value) {
            //dd($key);
            $setting = Setting::where('key', $key)->first();
            //dd($setting);
            foreach ($value as $key => $value2) {
                // code...
                //dd($value2);
                $setting->update(['value' => $value2]);
            }
        }

        return back()->with('success', 'تم تحديث الاعدادات');
    }
}
