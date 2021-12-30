<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\CreateRequest;
use App\Http\Requests\Admin\Brand\updateBrand;
use App\Models\product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = brand::all();
        return view('admin.page.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->all();
        brand::create($data);

        return response()->json(['status' => true]);
    }

    public function destroyAll($id)
    {
        $brand = brand::find($id);
        if($brand){
            $brand->delete();
            $listBrand = product::where('brand_id', $id)->get();
            foreach($listBrand as $key => $value){
                $value->delete();
            }
            return response()->json(true);
        }
        return response()->json(false);
    }



    public function show(brand $brand)
    {
        //
    }


    public function updateIsView($id)
    {
        $brand = brand::find($id);

        if($brand){
            $brand->is_view = ($brand->is_view + 1) % 2;
            $brand->save();

            return response()->json(true);
        }

        return response()->json(false);
    }


    public function edit($id)
    {
        $brand = brand::find($id);
        if($brand){
            return response()->json(["data" => $brand]);
        }else {
            toastr()->error("Brand not exits");
            // return redirect('/admin/categories/index');
            return $this->index();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(updateBrand $request)
    {
        $data = $request->all();
        $category = brand::find($request->id);
        $category->update($data);
        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brand $brand)
    {
        //
    }
}
