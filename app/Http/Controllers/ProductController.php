<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Product\createRequest;
use App\Models\categories;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::join('categories', 'category_id', 'categories.id')
                                ->select('products.*', 'categories.name as nameCate')
                                ->get();
        $categories = categories::where('is_view', 1)->get();
        return view('admin.page.products.index', compact('products', 'categories'));
    }


    public function create()
    {
        $categories = categories::where('is_view', 1)->get();
        return view('admin.page.products.create', compact('categories'));
    }


    public function store(createRequest $request)
    {
        $data = $request->all();
        product::create($data);

        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = product::find($id);
        if($products){
            // return response()->json(["data"  => $product]);
            return response()->json(["data" => $products]);
        }else {
            toastr()->error("Product does not exits");
        }
    }

    public function changeValueView(Request $request)
    {
        $id = $request->id;
        $product = product::find($id);
        if($product){
            // $product->is_view = ! $product->is_view;
            $product->is_view = ($product->is_view + 1) % 2;
            $product->save();
            return response()->json(['status' => true, 'is_view' => $product->is_view]);
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = product::find($id);
        if($category){
            $category->delete();
            return response()->json(true);
        }
        return response()->json(false);
    }
}
