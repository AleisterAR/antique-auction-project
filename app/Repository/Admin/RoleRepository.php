<?php

namespace App\Repository\Admin;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    protected $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getAll()
    {
        return $this->model::get();
    }
}
