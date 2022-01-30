<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function viewInventory()
    {
        $data = product::all();
        return view('admin.page.storage.Inventory_mn', compact('data'));
    }

    public function viewOder()
    {
        return view('admin.page.storage.Order_mn');
    }


}
