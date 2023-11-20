<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Throwable;

class EntryRegisterController extends Controller
{
    public function __invoke()
    {
        $roles = Role::get();
        return view('admin.entry-register', compact('roles'));
    }

    public function store(RegisterRequest $request)
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
