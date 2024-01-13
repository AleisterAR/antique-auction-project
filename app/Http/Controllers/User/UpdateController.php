<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        try {
            $item = Item::with(['category', 'provenance.image', 'image'])
                ->where('user_id', auth()->user()->id)
                ->where('id', $id)
                ->firstOrFail();
                
            $categories =  Category::get();
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            abort(403);
        }
        return view('user.item.update', compact('categories', 'item'));
    }
}
