<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfessionRequest;
use App\Http\Requests\UpdateProfessionRequest;
use App\Models\Profession;

class ProfessionsController extends Controller
{
    public function index()
    {
        $professions = Profession::paginate(10);
        return view('professions.index', compact('professions'));
    }

    public function create()
    {
        return view('professions.create');
    }

    public function store(CreateProfessionRequest $request)
    {
        $data = $request->all();

        Profession::create($data);

        return redirect()->route('professions.index')->with('success', 'Profession created successfully');
    }

    public function show($id)
    {
        $profession = Profession::findOrFail($id);
        return view('profession.show', compact('profession'));
    }

    public function edit($id)
    {
        $profession = Profession::findOrFail($id);
        return view('professions.edit', compact('profession'));
    }

    public function update(UpdateProfessionRequest $request, $id)
    {
        $profession = Profession::findOrFail($id);

        $profession->update($request->validated());

        return redirect()->route('professions.index')->with('success', 'Profession updated successfully');

    }

    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();

        return redirect()->route('professions.index')->with('success', 'Profession deleted successfully');
    }
}

