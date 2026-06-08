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
}