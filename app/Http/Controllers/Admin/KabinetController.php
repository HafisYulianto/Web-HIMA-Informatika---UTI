<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KabinetController extends Controller
{
    public function index()
    {
        $kabinets = Kabinet::latest()->paginate(10);
        return view('admin.kabinet.index', compact('kabinets'));
    }

    public function create()
    {
        return view('admin.kabinet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('kabinet', 'public');
        }

        Kabinet::create($data);

        return redirect()->route('admin.kabinet.index')->with('success', 'Kabinet berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $kabinet = Kabinet::findOrFail($id);
        return view('admin.kabinet.edit', compact('kabinet'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $kabinet = Kabinet::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            if ($kabinet->logo) {
                Storage::disk('public')->delete($kabinet->logo);
            }
            $data['logo'] = $request->file('logo')->store('kabinet', 'public');
        }

        $kabinet->update($data);

        return redirect()->route('admin.kabinet.index')->with('success', 'Kabinet berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kabinet = Kabinet::findOrFail($id);
        if ($kabinet->logo) {
            Storage::disk('public')->delete($kabinet->logo);
        }
        $kabinet->delete();

        return redirect()->route('admin.kabinet.index')->with('success', 'Kabinet berhasil dihapus.');
    }
}
