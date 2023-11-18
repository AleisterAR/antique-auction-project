<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function updateStatus(Request $request, $id)
    {
        $status = $request->status;
        $item = Item::findOrFail($id);
        $item->update(['status' => $status]);
        return back();
    }
}
