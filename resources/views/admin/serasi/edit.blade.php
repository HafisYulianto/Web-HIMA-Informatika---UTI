@extends('layouts.admin')

@section('content')
<div class="max-w-4xl">
    {{-- Header --}}
    <div class="mb-6">
        <a href="{{ route('admin.serasi.index') }}" class="inline-flex items-center gap-1 text-sm text-slate-400 hover:text-white transition-colors mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Edit Aspirasi</h1>
        <p class="text-sm text-slate-400 mt-1">Perbarui data aspirasi dari <span class="text-white font-medium">{{ $serasi->nama }}</span></p>
    </div>

    {{-- Form --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form action="{{ route('admin.serasi.update', $serasi->id) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Nama</label>
                    <input type="text" name="nama" value="{{ $serasi->nama }}" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">NPM</label>
                    <input type="text" name="npm" value="{{ $serasi->npm }}" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Email</label>
                    <input type="email" name="email" value="{{ $serasi->email }}" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Telpon</label>
                    <input type="text" name="telpon" value="{{ $serasi->telpon }}" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Kategori</label>
                    <select name="kategori" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all" required>
                        <option value="akademik" {{ $serasi->kategori == 'akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="non-akademik" {{ $serasi->kategori == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Status</label>
                    <select name="status" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all">
                        <option value="tinjau" {{ $serasi->status == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
                        <option value="proses" {{ $serasi->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="tolak" {{ $serasi->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                        <option value="selesai" {{ $serasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Deskripsi Laporan</label>
                    <textarea name="deskripsi_laporan" rows="4" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all resize-none" required>{{ $serasi->deskripsi_laporan }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Pesan Balasan</label>
                    <textarea name="pesan_balasan" rows="3" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all resize-none" placeholder="Tulis balasan untuk aspirasi ini...">{{ $serasi->pesan_balasan }}</textarea>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-500 text-white text-sm font-semibold rounded-xl hover:from-emerald-700 hover:to-teal-600 transition-all duration-300 shadow-lg shadow-emerald-500/20">
                    <i class="bi bi-check-lg"></i> Update
                </button>
                <a href="{{ route('admin.serasi.index') }}" class="px-5 py-2.5 bg-slate-800 text-slate-300 text-sm font-medium rounded-xl hover:bg-slate-700 transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
