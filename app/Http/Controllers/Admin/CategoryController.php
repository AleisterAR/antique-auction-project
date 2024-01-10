<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(){
        return view('admin.user.category');
    }

    public function  store(Request $request){
        $name=  $request->name;
        Category::create(['name' => $name]);
        return redirect()->back();
    }
}
