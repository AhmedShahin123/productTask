<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;

use App\Models\User;
use App\Models\SubCategory;
use App\Models\Category;
use Validator;
use File;
use Carbon;

class ProductsAdditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAdditions = ProductOption::latest()->get();

        return view('admin.productsadditions.index', ['productAdditions' => ProductOption::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::latest()->get();
        return view('admin.productsadditions.create', compact('products'));
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
          'product_id' => 'required',
          'key' => 'required',
          'value' => 'required',
          'img' => 'required',
          'price' => 'required',

         ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }



        $data = request()->all();
        if (request()->hasFile('img')) {
            $data['img'] = uploadImgFromMobile(request('img'), 'category');
        }


        $product = new ProductOption($data);
        if ($product->save()) {
            return redirect()->route('productsAdditions.index')->with('success', 'تم إضافة منتج جديد');
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
        $productAddition = ProductOption::findOrFail($id);
        $products = Product::latest()->get();


        return view('admin.productsadditions.edit', compact('productAddition', 'products'));
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
        $products = ProductOption::findOrFail($id);

        $validator = Validator::make(request()->all(), [
          'product_id' => 'required',
          'key' => 'required',
          'value' => 'required',
          'img' => 'nullable',
          'price' => 'required',
         ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $inputs = request()->all();

        if (request()->hasFile('img')) {
            $inputs['img'] = uploadImgFromMobile(request('img'), 'category');
        }


        $products->update($inputs);
        return redirect()->route('productsAdditions.index')->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductOption::findOrFail($id);

        $product->delete();
        return redirect()->route('productsAdditions.index')->with('success', 'تم حذف المنتج');
    }

    public function productactive($id)
    {
        $product = ProductOption::find($id);
        if ($product->active == 1) {
            $product->update(['active' => 0]);
            return back()->with('success', 'تم الغاء التفعيل بنجاح');
        } else {
            $product->update(['active' => 1]);
            return back()->with('success', 'تم التفعيل بنجاح');
        }
    }
}
