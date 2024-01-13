<?php

namespace App\Repository\User;

use App\Models\Image;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemRepository
{
    protected $model;
    public function __construct(Item $item)
    {
        $this->model = $item;
    }

    public function store($data): Item
    {
        return $this->model::create($data);
    }

    public function findOneByUser($id, $userId, $select = '*'): Item
    {
        return $this->model::query()
            ->select($select)
            ->with(['image', 'provenance'])
            ->where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findById($id, $select = '*'): Item
    {
        return $this->model::query()
            ->select($select)
            ->with(['image', 'provenance'])
            ->findOrFail($id);
    }

    public function storeImages(Item $item, $data)
    {
        $item->images()->createMany($data);
    }

    public function destroy($id)
    {
        Item::where('id', $id)->where('user_id', auth()->user()->id)->delete();
    }

    public function update($item, $id)
    {
        return Item::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail()
            ->update($item);
    }
}
