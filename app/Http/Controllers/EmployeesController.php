<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Profession;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $professions = Profession::all();
        return view('employees.create', compact('professions'));
    }

    public function store(CreateEmployeeRequest $request)
    {

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        }

        $data = $request->all();
        $data['profile_image'] = $imagePath ?? null;

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $professions = Profession::all();

        return view('employees.edit', compact('employee', 'professions'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {

        $employee = Employee::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            if ($employee->profile_image) {
                Storage::disk('public')->delete($employee->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $employee->profile_image = $imagePath;
        }

        $employee->update($request->except('profile_image'));

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
