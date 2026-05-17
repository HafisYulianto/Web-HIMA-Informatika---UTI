@extends('layouts.admin')

@section('content')
<div class="max-w-4xl space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.program.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors mb-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Edit Program Kerja</h1>
        <p class="text-sm text-slate-400 mt-1">Perbarui detail program unggulan</p>
    </div>

    {{-- Form --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8">
        <form action="{{ route('admin.program.update', $program->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="judul" class="block text-sm font-medium text-slate-300 mb-2">Judul Program</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul', $program->judul) }}" required
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('judul') border-red-500 focus:ring-red-500/20 @enderror">
                    @error('judul')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-slate-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" required
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('deskripsi') border-red-500 focus:ring-red-500/20 @enderror">{{ old('deskripsi', $program->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="kegiatan_utama" class="block text-sm font-medium text-slate-300 mb-2">Kegiatan Utama (Opsional)</label>
                    <textarea name="kegiatan_utama" id="kegiatan_utama" rows="2"
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('kegiatan_utama') border-red-500 focus:ring-red-500/20 @enderror">{{ old('kegiatan_utama', $program->kegiatan_utama) }}</textarea>
                    @error('kegiatan_utama')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="manfaat" class="block text-sm font-medium text-slate-300 mb-2">Manfaat (Opsional)</label>
                    <textarea name="manfaat" id="manfaat" rows="2"
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('manfaat') border-red-500 focus:ring-red-500/20 @enderror">{{ old('manfaat', $program->manfaat) }}</textarea>
                    @error('manfaat')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-300 mb-2">Gambar Saat Ini</label>
                    @if($program->gambar)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->judul }}" class="h-40 w-auto object-contain bg-white/10 rounded-lg p-2 border border-slate-700">
                        </div>
                    @else
                        <p class="text-sm text-slate-500 mb-4">Belum ada gambar ilustrasi.</p>
                    @endif

                    <label for="gambar" class="block text-sm font-medium text-slate-300 mb-2">Upload Gambar Baru (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*"
                        class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2.5 file:px-4
                        file:rounded-xl file:border-0
                        file:text-sm file:font-semibold
                        file:bg-slate-800 file:text-slate-300
                        hover:file:bg-slate-700 transition-all
                        @error('gambar') border-red-500 focus:ring-red-500/20 @enderror">
                    <p class="mt-2 text-xs text-slate-500">Format: JPG, PNG, SVG (Maks. 2MB). Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    @error('gambar')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-6 border-t border-slate-800">
                <button type="submit" 
                    class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
                    <i class="bi bi-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
