<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Repository\Admin\ItemRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemRepository;
    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function status(Request $request, $id)
    {
        $this->itemRepository->status($request,$id);
        return back();
    }
}
