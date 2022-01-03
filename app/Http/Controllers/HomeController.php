<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;
use Auth;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $products = Product::all();
      return view('products',compact('products'));
    }

    public function productDetails($id)
    {
      $product = Product::where('id',$id)->with('options','images')->first();


      $palette = Palette::fromFilename(public_path('uploads/'.$product->img));
      //dd($palette);

      $topEightColors = $palette->getMostUsedColors(3);
      //dd($topEightColors);



        return view('productDetails',compact('product'));
    }

    public function createOrder()
    {


       $validator = Validator::make(request()->all(), [
         'product_id' => 'required',
         'qty' => 'required|numeric',

        ]);

       if ($validator->fails()) {
           return redirect()->back()->with('errors', $validator->errors());
       }

       if(!Auth::check()){
         return redirect()->back()->with('error', 'please login first');
       }

       $data = request()->all();
       $product = Product::find(request('product_id'));
       $order = new Order();
       $order->option_ids = (json_encode(request()->except('product_id','qty','_token')));
       $order->product_id = $product->id;
       $order->user_id = Auth::id();
       $order->total = $product->price * request('qty');
       $order->save();
       return redirect('/')->with('success', 'Thanks, Your order created');

    }
}
