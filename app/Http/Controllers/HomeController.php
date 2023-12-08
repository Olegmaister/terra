<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function dashboard()
    {
        $employees = Employee::paginate(10);
        $employees->load('profession');
        return view('home.dashboard', compact('employees'));
    }
}

