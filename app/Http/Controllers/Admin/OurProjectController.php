<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurProjectController extends Controller
{
    public function index()
    {
        $projects = OurProject::latest()->paginate(10);
        return view('admin.our-project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.our-project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('our-projects', 'public');
        }

        OurProject::create($data);

        return redirect()->route('admin.our-project.index')->with('success', 'Project berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $project = OurProject::findOrFail($id);
        return view('admin.our-project.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|url|max:500',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $project = OurProject::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($project->foto) {
                Storage::disk('public')->delete($project->foto);
            }
            $data['foto'] = $request->file('foto')->store('our-projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.our-project.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $project = OurProject::findOrFail($id);
        if ($project->foto) {
            Storage::disk('public')->delete($project->foto);
        }
        $project->delete();

        return redirect()->route('admin.our-project.index')->with('success', 'Project berhasil dihapus.');
    }
}
