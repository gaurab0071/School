<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleandPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::all();
        return view('admin.roleANDpermission.index', compact('roles', 'users', 'permissions'));
    }

    public function storeRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        toast("Record Saved Successfully !", 'success');
        return redirect()->back();
    }

    public function setPermission($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_id", $id)
            ->pluck("role_has_permissions.permission_id")->toArray();
        return view('admin.roleANDpermission.setPermission', compact('role', 'permissions', 'rolePermissions'));
    }

    public function setPermissionStore(Request $request, $id)
    {
        $role = Role::find($id);
        foreach ($request->permission as $per) {
            $role->givePermissionTo($per);
        }
        toast("Record Saved Successfully !", 'success');
        // Redirect to the 'role.index' route (or any other route you intend to redirect to after updating permissions).
        return redirect()->route('role.index');
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        if($request->role == 'admin'){
            $user->role = 'admin';
        }
        else{
            $user->role = 'teacher';

        }
        $user->save();
        // $user->assignRole($request->input('role'));

        toast("Record Saved Successfully !", 'success');
        return redirect()->back();
    }


    public function deleteUser($id)
    {
        try {
            $user = User::find($id);
            if ($user->isRole == 0) {
                // toastr()->info('You can not delete the Admin ..');
                return redirect()->back();
            }
            $user->delete();
            toast("User Deleted Successfully !", 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast("User Deleted Successfully !", 'success');
            return redirect()->back();
        }
    }
}
