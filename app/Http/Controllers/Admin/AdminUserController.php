<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminUserFormRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminUsers = AdminUser::orderBy("created_at", "DESC")->paginate(10);

        return view('admin.admin_users.index', [
            "admin_users" => $adminUsers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_users.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserFormRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        
        $user = AdminUser::create($data);

        $user->roles()->sync($data['roles'] ?? []);

        return redirect(route("admin.admin_users.index"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = AdminUser::findOrFail($id);

        return view('admin.admin_users.create', [
            "user" => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserFormRequest $request, string $id)
    {
        $user = AdminUser::findOrFail($id);

        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        $user->roles()->sync($data['roles'] ?? []);

        return redirect(route("admin.admin_users.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AdminUser::destroy($id);

        return redirect(route("admin.admin_users.index"));
    }
}
