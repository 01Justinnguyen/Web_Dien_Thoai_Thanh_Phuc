<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\brand;
use App\Models\Cart;
use App\Models\categories;
use App\Models\City;
use App\Models\MainBanner;
use App\Models\product;
use App\Models\Province;
use App\Models\SubBanner;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\Cloner\Data;

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
            // toastr()->error("Product is not exits");
            return redirect('/errors');
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
            // toastr()->error("Product is not exits");
            return redirect('/errors');
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
            // toastr()->error("Product is not exits");
            return redirect('/errors');
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
        $checkout = Cart::all();

        $gioHang = null;
        $user = Auth::user();

        $city = City::orderby('matp', 'ASC')->get();
        $data = Address::all();

        if($user){
            $gioHang = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        return view('client.checkout', compact('gioHang', 'data', 'city', 'checkout'));
    }



    public function district($id)
    {
        // $data = $request->all();
        // if($data['action']){
        //     $output = '';
        //     if($data['action'] == 'city'){
        //         $select_district = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
        //         $output = '<option>Quận / Huyện</option>';
        //         foreach($select_district as $district){
        //             $output = '<option value="'.$district->maqh.'">'.$district->name_quanhuyen.'</option>';
        //         }
        //     } else {
        //         $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
        //         $output = '<option>Xã / Phường</option>';
        //         foreach($select_wards as $wards){
        //             $output = '<option value="'.$wards->xaid.'">'.$wards->name_xaphuong.'</option>';
        //         }
        //     }
        //     echo $output;
        // }

            $data = Province::where('matp',$id)->get();

           return response()->json(['data' => $data]);


    }

    public function wards($id)
    {
        $data = Wards::where('maqh',$id)->get();
        return response()->json(['data' => $data]);
    }

    public function checkoutData(Request $request)
    {
        $user = Auth::user();
        $data = Cart::where('user_id', $user->id)->where('type', 0)->first();
        $data = $request->all();

        Address::create($data);
        return response()->json(['data' => $data]);
    }

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


    public function editQty(Request $request)
    {
        $user = Auth::user();

        $data = Cart::where('type', 0)->where('user_id', $user->id)->where('id', $request->id)->first();

        if($data) {
            $data->qty = $request->qty;
            $data->save();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }


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
