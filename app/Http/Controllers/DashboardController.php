<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => User::all(),
            'mb' => MasterBarang::all(),
        ]);
    }
}
