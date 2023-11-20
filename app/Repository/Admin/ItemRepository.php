<?php

namespace App\Repository\Admin;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemRepository
{
    protected $model;
    public function __construct(Item $item)
    {
        $this->model = $item;
    }

    public function store(Request $request)
    {
        $data = array_merge($request->only(['name', 'description', 'condition']), ['user_id' => $request->user()->id]);
        $item = $this->model::create($data);
        $antiqueImage = $request->file('antique');
        $antiqueImage->store('antique');
        $item->images()->createMany([[
            'file_name' => $antiqueImage->hashName(),
            'extension' => $antiqueImage->extension(),
            'image_type' => config('global.image_type.image_of_antique')
        ]]);
        return $item;
    }

    public function status(Request $request, $id)
    {
        $status = $request->status;
        $item = $this->model::findOrFail($id);
        $item->update(['status' => $status]);
    }
}
