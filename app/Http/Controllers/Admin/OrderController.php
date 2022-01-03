<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Validator;
use File;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index', ['orders' => Order::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order= Order::find($id);
        return view('admin.orders.show', ['order' =>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();
        return redirect()->route('orders.index')->with('success', 'تم حذف المنتج');
    }

    public function activeOrder($id)
    {
        $order = Order::find($id);
        if ($order->status == 1) {
            $order->update(['status' => 0]);
            return back()->with('success', 'تم الغاء التفعيل بنجاح');
        } else {
            $order->update(['status' => 1]);
            //
            //
            // $notification = Notification::create([
            //   'user_id' => $user->id,
            //   'content' => 'تم التفعيل بنجاح من الادراة',
            //   'from_user_id' => Auth::guard('admin')->user()->id,
            //   'type' => 'admin',
            //   'notify_type' => $user->type
            //   ]);
            // if (!empty($user->token)) {
            //     NotificationsRepository::pushNotification($user->token, 'تم التفعيل بنجاح من الادراة', $notification->content, ['user_id' => $user->id, 'type' =>$user->type]);
            // }
            return back()->with('success', 'تم التفعيل بنجاح');
        }
    }
}
