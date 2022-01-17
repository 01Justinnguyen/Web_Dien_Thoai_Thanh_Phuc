<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\Cart;
use App\Models\categories;
use App\Models\MainBanner;
use App\Models\product;
use App\Models\SubBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function profile()
    {
        return view('client.profile');
    }

    public function errors()
    {
        return view('client.404');
    }

    public function thanks()
    {
        return view('client.thanks');
    }

    public function wishlist()
    {
        return view('client.wishlist');
    }

    public function detail($slug)
    {
        $i = 0;
        for($i = strlen($slug)-1; $i >= 0; $i--){
            if($slug[$i] == '-'){
                break;
            }
        }
        $id = Str::substr($slug, $i + 1, strlen($slug)- $i);
        $data = product::find($id);
        $products = product::all();
        if($data){
            $product = product::where('id', $data->id)->get();
            return view('client.detail', compact('product','data', 'products'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }

    public function shopProduct($slug)
    {
        $i = 0;
        for($i = strlen($slug)-1; $i >= 0; $i--){
            if($slug[$i] == '-'){
                break;
            }
        }
        $id = Str::substr($slug, $i + 1, strlen($slug)- $i);
        $data = brand::find($id);
        $banner = brand::all();
        if($data){
            $product = product::where('brand_id', $data->id)->where('id', '<>', $id)->get();
            return view('client.shopProduct', compact('product', 'data', 'banner'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
        return view('client.shopProduct');
    }

    public function shopCategory($slug)
    {
        $i = 0;
        for($i = strlen($slug)-1; $i >= 0; $i--){
            if($slug[$i] == '-'){
                break;
            }
        }
        $id = Str::substr($slug, $i + 1, strlen($slug)- $i);
        $data = categories::find($id);
        if($data){
            $product = product::where('category_id', $data->id)->get();
            return view('client.shopCategory', compact('product', 'data'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }

    }
    public function index()
    {
        $gioHang = null;
        $user = Auth::user();

        $SmallBanner1 = SubBanner::where('is_view_1', 1)->limit(1)->get();
        $SmallBanner2 = SubBanner::where('is_view_2', 1)->limit(1)->get();
        $SubBanner = SubBanner::where('is_view_sub', 1)->limit(1)->get();
        $mainBanner = MainBanner::where('is_view', 1)->get();
        $product = product::where('feature', 0)->get();
        $product2 = product::where('feature', 1)->get();
        $product3 = product::where('status', 2)->get();
        $listProducts = product::where('is_view', 1)->get();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }


        return view('client.index', compact('SmallBanner1', 'SmallBanner2', 'SubBanner', 'product', 'product2', 'product3', 'listProducts', 'mainBanner', 'gioHang'));
    }

    public function search(Request $request)
    {
        $keyWords = $request->keywords_submit;

        $SmallBanner1 = SubBanner::where('is_view_1', 1)->limit(1)->get();
        $SmallBanner2 = SubBanner::where('is_view_2', 1)->limit(1)->get();
        $SubBanner = SubBanner::where('is_view_sub', 1)->limit(1)->get();
        $mainBanner = MainBanner::where('is_view', 1)->get();
        $product = product::where('feature', 0)->get();
        $product2 = product::where('feature', 1)->get();
        $product3 = product::where('status', 2)->get();
        $search_Products = product::where('name', 'like', '%' .$keyWords. '%')->get();
        return view('client.search', compact('SmallBanner1', 'SmallBanner2', 'SubBanner', 'product', 'product2', 'product3', 'mainBanner', 'search_Products'));
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
