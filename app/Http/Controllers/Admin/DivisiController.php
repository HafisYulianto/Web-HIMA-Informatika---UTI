<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::latest()->paginate(10);
        return view('admin.divisi.index', compact('divisis'));
    }

    public function create()
    {
        return view('admin.divisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('divisi', 'public');
        }

        Divisi::create($data);

        return redirect()->route('admin.divisi.index')->with('success', 'Divisi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('admin.divisi.edit', compact('divisi'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $divisi = Divisi::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            if ($divisi->logo) {
                Storage::disk('public')->delete($divisi->logo);
            }
            $data['logo'] = $request->file('logo')->store('divisi', 'public');
        }

        $divisi->update($data);

        return redirect()->route('admin.divisi.index')->with('success', 'Divisi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $divisi = Divisi::findOrFail($id);
        if ($divisi->logo) {
            Storage::disk('public')->delete($divisi->logo);
        }
        $divisi->delete();

        return redirect()->route('admin.divisi.index')->with('success', 'Divisi berhasil dihapus.');
    }
}
