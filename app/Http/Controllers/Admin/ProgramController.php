<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(10);
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kegiatan_utama' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('program', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.program.index')->with('success', 'Program Kerja berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kegiatan_utama' => 'nullable|string',
            'manfaat' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $program = Program::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($program->gambar) {
                Storage::disk('public')->delete($program->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('program', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.program.index')->with('success', 'Program Kerja berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        if ($program->gambar) {
            Storage::disk('public')->delete($program->gambar);
        }
        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program Kerja berhasil dihapus.');
    }
}
