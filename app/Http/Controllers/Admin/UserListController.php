<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserListController extends Controller
{
    public function __invoke(){
        $users = User::has('roles')->get();
        $users->load('roles');
        return view('admin.user.user-list', compact('users'));
    }
}
