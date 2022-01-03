<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductImage;
use App\Models\ProductOption;
use Validator;
use File;
use Carbon;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', ['products' => Product::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = User::where('type', 'merchant')->latest()->get();
        $options = ProductOption::where('product_id',null)->get();


        return view('admin.products.create', compact('providers','options'));
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
          'price' => 'required',
          'details' => 'required',
          'img' => 'required'
         ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }



        $data = request()->all();

        if (request()->hasFile('img')) {
            $data['img'] = uploadImgFromMobile(request('img'), 'category');
        }




        $product = new Product($data);
        $product->user_id = request('user_id');
        if ($product->save()) {
          if (request()->hasFile('images')) {
                  $files=request()->file('images');
                  foreach ($files as $file) {
                      $name = uploadImgFromMobile($file, 'product');
                      $productImage = new ProductImage;
                      $productImage->img  = $name;
                      $productImage->product_id = $product->id;
                      $productImage->save();
                  }
              }
            return redirect()->route('products.index')->with('success', 'تم إضافة منتج جديد');
        }
        return back()->with('error', 'حدث خطأ حاول مرة اخري');
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
        $product = Product::findOrFail($id);
        $providers = User::where('type', 'merchant')->latest()->get();


        return view('admin.products.edit', compact('product', 'providers'));
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
        $products = Product::findOrFail($id);

        $validator = Validator::make(request()->all(), [
          'name' => 'nullable',
          'price' => 'nullable',
          'details' => 'nullable',
          'img' => 'nullable'
         ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $inputs = request()->all();

        if (request()->hasFile('img')) {
            $inputs['img'] = uploadImgFromMobile(request('img'), 'category');
        }






        $products->update($inputs);

        if (request()->hasFile('images')) {
                $files=request()->file('images');
                foreach ($files as $file) {
                    $name = uploadImgFromMobile($file, 'product');
                    $productImage = new ProductImage;
                    $productImage->img  = $name;
                    $productImage->product_id = $id;
                    $productImage->save();
                }
            }


        return redirect()->route('products.index')->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->avatar) {
            File::delete(public_path('uploads/'.$product->avatar));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'تم حذف المنتج');
    }

    public function productactive($id)
    {
        $product = Product::find($id);
        if ($product->active == 1) {
            $product->update(['active' => 0]);
            return back()->with('success', 'تم الغاء التفعيل بنجاح');
        } else {
            $product->update(['active' => 1]);
            return back()->with('success', 'تم التفعيل بنجاح');
        }
    }
}
