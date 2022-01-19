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
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
        return view('client.profile', compact('gioHang'));
    }

    public function errors()
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
        return view('client.404', compact('gioHang'));
    }

    public function thanks()
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
        return view('client.thanks', compact('gioHang'));
    }

    public function wishlist()
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
        return view('client.wishlist', compact('gioHang'));
    }

    public function detail($slug)
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
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
            return view('client.detail', compact('product','data', 'products', 'gioHang'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }

    public function shopProduct($slug)
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

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
            return view('client.shopProduct', compact('product', 'data', 'banner', 'gioHang'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
        return view('client.shopProduct');
    }

    public function shopCategory($slug)
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
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
            return view('client.shopCategory', compact('product', 'data', 'gioHang'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }

    }
    public function index()
    {
        $SmallBanner1 = SubBanner::where('is_view_1', 1)->limit(1)->get();
        $SmallBanner2 = SubBanner::where('is_view_2', 1)->limit(1)->get();
        $SubBanner = SubBanner::where('is_view_sub', 1)->limit(1)->get();
        $mainBanner = MainBanner::where('is_view', 1)->get();
        $product = product::where('feature', 0)->get();
        $product2 = product::where('feature', 1)->get();
        $product3 = product::where('status', 2)->get();
        $listProducts = product::where('is_view', 1)->get();

        $gioHang = null;
        $user = Auth::user();

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
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
        return view('client.login_register', compact('gioHang'));
    }

    public function checkout()
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        // $data = Cart::where('user_id', $user->id)->where('type', 0)->get();
        return view('client.checkout', compact('gioHang'));
    }

    // public function checkoutData()
    // {
    //     $user = Auth::user();
    //     $data = Cart::where('user_id', $user->id)->where('type', 0)->get();

    //     return response()->json(['data' => $data]);
    // }

    public function cart()
    {
        $gioHang = null;
        $user = Auth::user();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }
        return view('client.cart', compact('gioHang'));
    }

    public function cartData()
    {
        $user = Auth::user();
        // $data = Cart::where('user_id', $user->id)->where('type', 0)->get();
        $data = Cart::join('products', 'products.id', 'carts.product_id')
	                ->select('carts.*', 'products.image_product','products.price_root','products.price_sell','products.name')
	                ->where('carts.user_id', $user->id)
	                ->where('products.status', 0)
	                ->get();
        return response()->json(['data' => $data]);
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
