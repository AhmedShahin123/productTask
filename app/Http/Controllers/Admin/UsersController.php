<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use App\Models\Subject;
use App\Models\Grade;
use Validator;
use File;
use App\Repository\NotificationsRepository;
use App\Models\Notification;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::latest()->get());
        return view('admin.users.index', ['users' => User::where('type', 'user')->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
          'name' => 'required',
          'phone' => 'required|unique:users,phone',
          'password' => 'required|min:6',
          'email' => 'required|unique:users,email'
          ]);


        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $inputs = request()->all();
        //dd($inputs);

        $inputs['password'] = bcrypt($inputs['password']);

        $inputs['avatar'] = uploadImage($inputs['avatar'], 'user');

        $user = new User($inputs);
        $user->active =  1;


        if ($user->save()) {
            return redirect()->route('users.index')->with('success', 'تم إضافة مستخدم جديد');
            //}
            return back()->with('error', 'حدث خطأ حاول مرة اخري');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(request()->all(), [
        'name' => 'nullable',
        'phone' => 'nullable',
        'password' => 'nullable|min:6',
        'email' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $inputs = request()->all();
        $inputs['password'] = bcrypt($inputs['password']);
        //dd('aa');

        if ($user->email != request('email')) {
            while (User::where('email', request('email'))->first()) {
                return back()->with('error', 'The email has already been taken.');
            }
        }
        if ($user->phone != request('phone')) {
            while (User::where('phone', request('phone'))->first()) {
                return back()->with('error', 'The phone has already been taken.');
            }
        }

        if (request()->hasFile('avatar')) {
            $inputs['avatar'] = uploadImage($inputs['avatar'], 'user');
        }

        if ($user->update($inputs)) {
            return redirect()->route('users.index')->with('success', 'تم إضافة مستخدم جديد');
        }
        return back()->with('error', 'حدث خطأ حاول مرة اخري');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //dd($user);
        $user = User::find($id);
        if ($user->img) {
            File::delete(public_path('uploads/'.$user->img));
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم');
    }


    public function active($id)
    {
        $user = User::find($id);
        if ($user->active == 1) {
            $user->update(['active' => 0]);
            return back()->with('success', 'تم الغاء التفعيل بنجاح');
        } else {
            $user->update(['active' => 1]);


            $notification = Notification::create([
              'user_id' => $user->id,
              'content' => 'تم التفعيل بنجاح من الادراة',
              'from_user_id' => Auth::guard('admin')->user()->id,
              'type' => 'admin',
              'notify_type' => $user->type
              ]);
            if (!empty($user->token)) {
                NotificationsRepository::pushNotification($user->token, 'تم التفعيل بنجاح من الادراة', $notification->content, ['user_id' => $user->id, 'type' =>$user->type]);
            }
            return back()->with('success', 'تم التفعيل بنجاح');
        }
    }
}
