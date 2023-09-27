<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.settings', compact('users'));
    }

    public function newAdmin(Request $request)
    {
        if (auth()->id() != 1) {
            return redirect()->route('user.settings');
        }
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return back()->with('success', 'New user has been added.');
    }

    public function deleteAdmin($id)
    {
        if ($id == 1) {
            return back()->withErrors(['adm_err' => 'User cannot be deleted']);
        }
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'User has been deleted');
    }
}
