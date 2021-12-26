<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\createRequest;
use App\Http\Requests\Admin\Category\updateRequest;
use App\Models\categories;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function index()
    {
        $listCategories = DB::table('categories as A')
                        ->leftJoin('categories as B', 'A.parent_id', 'B.id')
                        ->select('A.*', 'B.name as nameParent')
                        ->get();
        $categories = categories::where('parent_id', 0)->get();
        return view('admin.page.categories.index', compact('listCategories', 'categories'));
    }


    public function create()
    {
        $categories = categories::where('parent_id', 0)->get();
        return view('admin.page.categories.create', compact('categories'));
    }


    public function store(createRequest $request)
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


    public function edit($id)
    {
        $category = categories::find($id);

        if($category){
            return response()->json(["data" => $category]);
        }else {
            toastr()->error("Category not exits");
            // return redirect('/admin/categories/index');
            return $this->index();
        }
    }


    public function update(updateRequest $request)
    {
        $data = $request->all();
        $category = categories::find($request->id);
        $category->update($data);
        return response()->json(['status' => true]);
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
            $listCate = product::where('category_id', $id)->get();
            foreach($listCate as $key => $value){
                $value->delete();
            }
            return response()->json(true);
        }
        return response()->json(false);
    }
}
