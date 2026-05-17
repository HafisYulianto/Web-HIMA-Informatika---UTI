@extends('layouts.admin')

@section('content')
<div class="max-w-3xl space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.divisi.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors mb-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Edit Divisi</h1>
        <p class="text-sm text-slate-400 mt-1">Perbarui data divisi dan logonya</p>
    </div>

    {{-- Form --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8">
        <form action="{{ route('admin.divisi.update', $divisi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block text-sm font-medium text-slate-300 mb-2">Nama Divisi</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $divisi->nama) }}" required
                    class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('nama') border-red-500 focus:ring-red-500/20 @enderror"
                    placeholder="Masukkan nama divisi...">
                @error('nama')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Logo Divisi Saat Ini</label>
                @if($divisi->logo)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $divisi->logo) }}" alt="Logo {{ $divisi->nama }}" class="w-32 h-32 object-contain bg-white/10 rounded-lg p-2 border border-slate-700">
                    </div>
                @else
                    <p class="text-sm text-slate-500 mb-4">Belum ada logo.</p>
                @endif

                <label for="logo" class="block text-sm font-medium text-slate-300 mb-2">Upload Logo Baru (Opsional)</label>
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2.5 file:px-4
                    file:rounded-xl file:border-0
                    file:text-sm file:font-semibold
                    file:bg-slate-800 file:text-slate-300
                    hover:file:bg-slate-700 transition-all
                    @error('logo') border-red-500 focus:ring-red-500/20 @enderror">
                <p class="mt-2 text-xs text-slate-500">Format: JPG, PNG, SVG (Maks. 2MB). Biarkan kosong jika tidak ingin mengubah logo.</p>
                @error('logo')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-slate-800">
                <button type="submit" 
                    class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
                    <i class="bi bi-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
