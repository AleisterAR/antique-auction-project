<?php

namespace App\Repository\User;

use App\Models\Category;

class CategoryRepository
{
    protected $model;
    
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getAll()
    {
        return $this->model::query()->get();
    }
}
