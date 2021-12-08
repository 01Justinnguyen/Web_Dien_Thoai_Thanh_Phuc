<?php

namespace App\Http\Controllers;


use App\Http\Requests\categoryRequest;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class   CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = DB::table('categories as A')
                        ->leftJoin('categories as B', 'A.parent_id', 'B.id')
                        ->select('A.*', 'B.name as nameParent')
                        ->get();
        $categories = categories::where('parent_id', 0)->get();
        return view('admin.page.categoies.index', compact('listCategories', 'categories'));
    }


    public function create()
    {
        $categories = categories::where('parent_id', 0)->get();
        return view('admin.page.categoies.create', compact('categories'));
    }


    public function store(categoryRequest $request)
    {
        $data = $request->all();
        categories::create($data);

        return response()->json(['status' => true]);
    }

    public function updateIsView($id)
    {
        $category = categories::find($id);

        if($category){
            $category->is_view = ($category->is_view + 1) % 2;
            $category->save();

            return response()->json(true);
        }

        return response()->json(false);
    }

    public function show(categories $categories)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = categories::find($id);

        if($category){
            return response()->json(["data" => $category]);
        }else {
            toastr()->error("Category not exits");
            return redirect('/admin/categories/index');
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
    }


    public function destroyOnly($id)
    {
        $category = categories::find($id);
        if($category){
            $category->delete();
            $listCate = categories::where('parent_id', $id)->get();
            foreach($listCate as $key => $value){
            $value->parent_id = 0;
            $value->save();
        }
        return response()->json(true);
        }
        return response()->json(false);
    }

    public function destroyAll($id)
    {
        $category = categories::find($id);
        if($category){
            $category->delete();
            $listCate = categories::where('parent_id', $id)->get();
            foreach($listCate as $key => $value){
                $value->delete();
            }
            return response()->json(true);
        }
        return response()->json(false);
    }
}
