@extends('layouts.admin')

@section('content')
<div class="max-w-3xl space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.our-project.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors mb-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Edit Project</h1>
        <p class="text-sm text-slate-400 mt-1">Perbarui data project "{{ $project->nama }}"</p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="px-4 py-3 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400 text-sm space-y-1">
        <div class="flex items-center gap-2 font-semibold">
            <i class="bi bi-exclamation-triangle-fill"></i> Terdapat kesalahan:
        </div>
        <ul class="list-disc list-inside space-y-0.5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8">
        <form action="{{ route('admin.our-project.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Nama Project --}}
            <div>
                <label for="nama" class="block text-sm font-medium text-slate-300 mb-2">Nama Project</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $project->nama) }}" required
                    class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('nama') border-red-500 focus:ring-red-500/20 @enderror"
                    placeholder="Masukkan nama project...">
                @error('nama')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-slate-300 mb-2">Deskripsi Project</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required
                    class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all resize-y @error('deskripsi') border-red-500 focus:ring-red-500/20 @enderror"
                    placeholder="Jelaskan deskripsi project...">{{ old('deskripsi', $project->deskripsi) }}</textarea>
                @error('deskripsi')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Link Project --}}
            <div>
                <label for="link" class="block text-sm font-medium text-slate-300 mb-2">Link Project (Opsional)</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                        <i class="bi bi-link-45deg"></i>
                    </span>
                    <input type="url" name="link" id="link" value="{{ old('link', $project->link) }}"
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl pl-10 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all @error('link') border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="https://example.com">
                </div>
                <p class="mt-2 text-xs text-slate-500">Masukkan URL lengkap project (termasuk https://)</p>
                @error('link')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto Project --}}
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-2">Foto Project Saat Ini</label>
                @if($project->foto)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $project->foto) }}" alt="{{ $project->nama }}" 
                            class="max-w-xs rounded-xl border border-slate-700 object-cover">
                    </div>
                @else
                    <p class="text-sm text-slate-500 mb-4">Belum ada foto.</p>
                @endif

                <label for="foto" class="block text-sm font-medium text-slate-300 mb-2">Upload Foto Baru (Opsional)</label>
                <input type="file" name="foto" id="foto" accept="image/*"
                    class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2.5 file:px-4
                    file:rounded-xl file:border-0
                    file:text-sm file:font-semibold
                    file:bg-slate-800 file:text-slate-300
                    hover:file:bg-slate-700 transition-all
                    @error('foto') border-red-500 focus:ring-red-500/20 @enderror">
                <p class="mt-2 text-xs text-slate-500">Format: JPG, PNG, WEBP (Maks. 2MB). Biarkan kosong jika tidak ingin mengubah foto.</p>
                @error('foto')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror

                {{-- Image Preview --}}
                <div id="preview-container" class="mt-4 hidden">
                    <p class="text-xs text-slate-400 mb-2">Preview foto baru:</p>
                    <img id="preview-image" src="" alt="Preview" class="max-w-xs rounded-xl border border-slate-700">
                </div>
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

@section('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const container = document.getElementById('preview-container');
        const image = document.getElementById('preview-image');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                container.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            container.classList.add('hidden');
        }
    });
</script>
@endsection
