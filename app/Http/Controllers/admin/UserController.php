<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Admin\RoleRepository;
use App\Repository\Admin\UserRepository;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        $roles = $this->roleRepository->getAll();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->userRepository->store($request);
        session()->flash('success', 'Item created successfully.');
        return to_route('admin.user.create');
    }
}
