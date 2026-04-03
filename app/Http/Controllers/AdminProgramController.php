<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class AdminProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('admin.programs', compact('programs'));
    }

    public function create()
    {
        return view('admin.addprogram');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_program' => 'required|string',
            'info_program' => 'required|string',
            'icon' => 'required|string',
        ]);

        Program::create($request->only(['jenis_program', 'info_program', 'icon']));

        return redirect()->route('admin.programs')->with('success', 'Program added successfully.');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.editprogram', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_program' => 'required|string',
            'info_program' => 'required|string',
            'icon' => 'required|string',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('admin.programs')->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.programs')->with('success', 'Program deleted successfully.');
    }
}
