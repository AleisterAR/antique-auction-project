<?php

namespace App\Repository\User;

use App\Models\Provenance;
use Illuminate\Http\Request;

class ProvenanceRepository
{

    protected $model;

    public function __construct(Provenance $provenance)
    {
        $this->model = $provenance;
    }

    public function store(Request $request, $itemId)
    {
        $data = array_merge($request->only(['creator']), ['item_id' => $itemId, 'year' => $request->year]);
        $provenance = $this->model::create($data);
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
