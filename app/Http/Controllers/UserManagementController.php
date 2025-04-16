<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panel/users/users', compact('users'));
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('panel/users/editUser', compact('user', 'roles'));
    }
    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|min:6|confirmed'
        ]);
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();
        return redirect('dashboard/users');
    }
    public function deleteUser($id){
        $user=User::findOrFail($id);
        $user->delete();

        return redirect('dashboard/users');
    }
}
