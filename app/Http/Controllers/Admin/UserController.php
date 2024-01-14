<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        DB::beginTransaction();
        try {
            $this->userRepository->store($request);
            DB::commit();
            return to_route('admin.user.user-list');
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            abort(500);
        }
    }
}
