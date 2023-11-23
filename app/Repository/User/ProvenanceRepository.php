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

    public function store($data)
    {
        return $this->model::create($data);
    }

    public function storeImages(Provenance $provenance, $data)
    {
        $provenance->images()->createMany($data);
    }
}
