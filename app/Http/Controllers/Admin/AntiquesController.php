<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AntiquesController extends Controller
{
    public function __invoke(){
        return view('admin.user.antiques');
    }
}
