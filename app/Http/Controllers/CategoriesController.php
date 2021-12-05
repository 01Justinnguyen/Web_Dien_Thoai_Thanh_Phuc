<?php

namespace App\Http\Controllers;


use App\Http\Requests\categoryRequest;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
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
        return view('admin.page.categoies.listCategories', compact('listCategories'));
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
    public function edit(categories $categories)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        //
    }
}
