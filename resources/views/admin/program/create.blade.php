@extends('layouts.admin')

@section('content')
<div class="max-w-4xl space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.program.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors mb-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Tambah Program Kerja</h1>
        <p class="text-sm text-slate-400 mt-1">Tambahkan detail program unggulan baru</p>
    </div>

    {{-- Form --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8">
        <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="judul" class="block text-sm font-medium text-slate-300 mb-2">Judul Program</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('judul') border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="Contoh: Informatics Excellence Center (IEC) 2.0">
                    @error('judul')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-slate-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" required
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('deskripsi') border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="Deskripsi singkat mengenai program kerja ini...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="kegiatan_utama" class="block text-sm font-medium text-slate-300 mb-2">Kegiatan Utama (Opsional)</label>
                    <textarea name="kegiatan_utama" id="kegiatan_utama" rows="2"
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('kegiatan_utama') border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="Detail kegiatan utama...">{{ old('kegiatan_utama') }}</textarea>
                    @error('kegiatan_utama')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="manfaat" class="block text-sm font-medium text-slate-300 mb-2">Manfaat (Opsional)</label>
                    <textarea name="manfaat" id="manfaat" rows="2"
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('manfaat') border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="Manfaat yang didapatkan...">{{ old('manfaat') }}</textarea>
                    @error('manfaat')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="gambar" class="block text-sm font-medium text-slate-300 mb-2">Gambar Ilustrasi (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*"
                        class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2.5 file:px-4
                        file:rounded-xl file:border-0
                        file:text-sm file:font-semibold
                        file:bg-slate-800 file:text-slate-300
                        hover:file:bg-slate-700 transition-all
                        @error('gambar') border-red-500 focus:ring-red-500/20 @enderror">
                    <p class="mt-2 text-xs text-slate-500">Format: JPG, PNG, SVG (Maks. 2MB).</p>
                    @error('gambar')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-6 border-t border-slate-800">
                <button type="submit" 
                    class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
                    <i class="bi bi-save mr-2"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
