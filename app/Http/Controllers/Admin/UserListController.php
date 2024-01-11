<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserListController extends Controller
{
    public function __invoke(){
        return view('admin.user.user-list');
    }
}
