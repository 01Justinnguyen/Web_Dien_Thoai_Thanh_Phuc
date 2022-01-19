<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function removeProduct($id)
    {
        // Để xác định sản phẩm của người mua nào để xóa không được xóa vào sản phẩm của người khác
        $user = Auth::user();
        $data = Cart::where('id', $id)->where('user_id', $user->id)->where('type', 0)->first();
        if($data){
            $data->delete();
            return response()->json(true);
        }
        return response()->json(false);

        //     public function destroy($id)
        // {
        //     $danhsachacc = dichvu::find($id);
        //     if($danhsachacc){
        //         $danhsachacc->delete();
        //         return response()->json(true);
        //     }
        //     return response()->json(false);
        // }
    }

    public function store(CreateCartRequest $request)
    {
        $user_id = Auth::user()->id;
        $data = Cart::where('product_id', $request->product_id)->where('user_id', $user_id)->where('type', 0)->first();
        if($data) {
            $data->qty += $request->qty;
            $data->save();

        } else {
            $data = $request->all();
            $data['user_id'] = $user_id;
            $data['type']    = 0;
            Cart::create($data);
        }

        return response()->json(['data' => $data]);
    }


    public function show(Cart $cart)
    {
        //
    }


    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
