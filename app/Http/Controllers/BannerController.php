<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use App\Models\MainBanner;
use App\Models\SubBanner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMain = MainBanner::all();
        $listSub = SubBanner::all();
        return view('admin.page.banner.index', compact('listMain', 'listSub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMain(Request $request)
    {
        $data = $request->all();
        MainBanner::create($data);

        return response()->json(['status' => true]);
    }

    public function storeSub(Request $request)
    {
        $data = $request->all();
        SubBanner::create($data);

        return response()->json(['status' => true]);
    }

    public function updateIsViewMain(Request $request)
    {
        $id = $request->id;
        $banner = MainBanner::find($id);
        if($banner){
            $banner->is_view = ($banner->is_view + 1) % 2;
            $banner->save();
            return response()->json(['status' => true, 'is_view' => $banner->is_view]);
        } else {
            // Tìm không thấy
            return response()->json(['status' => false]);
        }
    }

    public function updateIsViewSub1(Request $request)
    {
        $id = $request->id;
        $banner1 = SubBanner::find($id);
        if($banner1){
            $banner1->is_view_1 = ($banner1->is_view_1 + 1) % 2;
            $banner1->save();
            return response()->json(['status' => true, 'is_view_1' => $banner1->is_view_1]);
        } else {
            // Tìm không thấy
            return response()->json(['status' => false]);
        }
    }

    public function updateIsViewSub2(Request $request)
    {
        $id = $request->id;
        $banner2 = SubBanner::find($id);
        if($banner2){
            $banner2->is_view_2 = ($banner2->is_view_2 + 1) % 2;
            $banner2->save();
            return response()->json(['status' => true, 'is_view_2' => $banner2->is_view_2]);
        } else {
            // Tìm không thấy
            return response()->json(['status' => false]);
        }
    }

    public function updateIsViewSub3(Request $request)
    {
        $id = $request->id;
        $banner3 = SubBanner::find($id);
        if($banner3){
            $banner3->is_view_sub = ($banner3->is_view_sub + 1) % 2;
            $banner3->save();
            return response()->json(['status' => true, 'is_view_sub' => $banner3->is_view_sub]);
        } else {
            // Tìm không thấy
            return response()->json(['status' => false]);
        }
    }


    public function destroyMain($id)
    {
        $MainBanner = MainBanner::find($id);
        if($MainBanner){
            $MainBanner->delete();
            return response()->json(true);
        }
        return response()->json(false);
    }


    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function editMain($id)
    {
        $MainBanner = MainBanner::find($id);
        if($MainBanner){
            return response()->json(["data" => $MainBanner]);
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
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
