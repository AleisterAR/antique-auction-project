<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Provenance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ItemController extends Controller
{
    public function index(Request $request)
    {
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $item = $this->storeItem($request);
            $this->storeProvenance($request, $item->id);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }

        return redirect()->route('user.item-register.index');
    }

    public function register()
    {
        return view('user.item.item-register');
    }

    private function storeItem(Request $request)
    {
        $data = array_merge($request->only(['name', 'description', 'condition']), ['user_id' => $request->user()->id]);
        $item = Item::create($data);
        $antiqueImage = $request->file('antique');
        $antiqueImage->store('antique');
        $item->images()->createMany([[
            'file_name' => $antiqueImage->hashName(),
            'extension' => $antiqueImage->extension(),
            'image_type' => config('global.image_type.image_of_antique')
        ]]);
        return $item;
    }

    private function storeProvenance(Request $request, $itemId)
    {
        $data = array_merge($request->only(['creator']), ['item_id' => $itemId, 'year' => $request->year]);
        $provenance = Provenance::create($data);
        $authenticityImage = $request->file('certificate');
        $authenticityImage->store('certificate');
        $provenance->images()->createMany([[
            'file_name' => $authenticityImage->hashName(),
            'extension' => $authenticityImage->extension(),
            'image_type' => config('global.image_type.certificate')
        ]]);
        return $provenance;
    }
}
