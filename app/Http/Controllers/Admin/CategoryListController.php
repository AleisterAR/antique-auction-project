<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryListController extends Controller
{
    public function __invoke(){
        $categories  = Category::get();
        return view('admin.user.category-list', compact('categories'));
    }
}
