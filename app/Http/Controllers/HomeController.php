<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\categories;
use App\Models\MainBanner;
use App\Models\product;
use App\Models\SubBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function profile()
    {
        return view('client.profile');
    }

    public function detail()
    {
        return view('client.detail');
    }

    public function shopProduct()
    {
        return view('client.shopProduct');
    }

    public function errors()
    {
        return view('client.404');
    }

    public function shopCategory($id)
    {
        $data = categories::find($id);
        $brands = brand::where('is_view', 1)->first();
        if($data){
            $product = product::where('category_id', $data->id)->get();
            return view('client.shopCategory', compact('product', 'data'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }

    public function loginRegister()
    {
        return view('client.login_register');
    }

    public function checkOut()
    {
        return view('client.checkout');
    }

    public function cart()
    {
        return view('client.cart');
    }

    public function index()
    {
        $banner = SubBanner::all();
        $mainBanner = MainBanner::where('is_view', 1)->get();
        $product = product::where('feature', 0)->get();
        $product2 = product::where('feature', 1)->get();
        $product3 = product::where('status', 2)->get();
        $listProducts = product::where('is_view', 1)->get();
        return view('client.index', compact('banner', 'product', 'product2', 'product3', 'listProducts', 'mainBanner'));
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
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
