<?php

namespace App\Repository\Admin;

use Throwable;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class UserRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.entry-register', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = array_merge($request->only(['user_name', 'full_name', 'email', 'phone_number', 'address']), ['password' => bcrypt($request->password)]);
            $role = Role::findOrFail($request->role);
            $user = User::create($data);
            $user->assignRole($role);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
        return to_route('entry-register');
    }
}
