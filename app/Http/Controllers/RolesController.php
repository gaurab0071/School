<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User; // Assuming you have a User model
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        $users = User::all(); // Retrieve all users
        $roles = Role::all(); // Retrieve all roles

        return view('assign_roles.index', compact('users', 'roles', 'teachers'));
    }


    public function create()
    {
        $teachers = Teacher::find(1);
        $roles = $teachers->role;
        // $roles = Role::all();
        return view('assign_roles.create', compact('teachers', 'roles'));
    }

    /**
     * Show the form for assigning roles to a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $roles = Role::all(); // Retrieve all roles

        return view('assign_roles.edit', compact('user', 'roles'));
    }

    /**
     * Update the roles for the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find the user by ID

        $selectedRoles = $request->input('roles'); // Get selected roles from the form

        // Sync the selected roles with the user
        $user->syncRoles($selectedRoles);

        // Redirect or return a response indicating success
        return redirect()->route('roles.index')->with('success', 'Roles assigned successfully');
    }


    public function assignRoleToTeacher(Request $request, $teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        $roleName = $request->input('role_name'); // Assuming you have a form input for selecting the role name
    
        if ($roleName) {
            $role = Role::where('name', $roleName)->first();
    
            if ($role) {
                $teacher->syncRoles([$role->name]);
                // You can also use $teacher->assignRole($role->name);
    
                return redirect()->back()->with('success', 'Role assigned successfully');
            }
        }
    
        return redirect()->back()->with('error', 'Role not found');
    }
    
}
