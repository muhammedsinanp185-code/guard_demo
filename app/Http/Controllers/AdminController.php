<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Manager;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::latest()->get();

        $managers = Manager::latest()->get();

        $userCount = User::count();

        $managerCount = Manager::count();

        return view('dashboards.admin', compact(
            'users',
            'managers',
            'userCount',
            'managerCount'
        ));
    }

    public function usersIndex()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function managersIndex()
    {
        $managers = Manager::latest()->get();
        return view('admin.managers.index', compact('managers'));
    }

    public function managersCreate()
    {
        return view('admin.managers.create');
    }

    public function managersStore(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:managers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->route('admin.managers.index')->with('success', 'Manager created successfully.');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}