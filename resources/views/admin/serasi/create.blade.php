@extends('layouts.admin')

@section('content')
<div class="max-w-4xl">
    {{-- Header --}}
    <div class="mb-6">
        <a href="{{ route('admin.serasi.index') }}" class="inline-flex items-center gap-1 text-sm text-slate-400 hover:text-white transition-colors mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Tambah Aspirasi</h1>
        <p class="text-sm text-slate-400 mt-1">Buat data aspirasi baru</p>
    </div>

    {{-- Form --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form action="{{ route('admin.serasi.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Nama</label>
                    <input type="text" name="nama" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="Nama lengkap" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">NPM</label>
                    <input type="text" name="npm" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="Nomor Pokok Mahasiswa" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Email</label>
                    <input type="email" name="email" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="email@example.com" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Telpon</label>
                    <input type="text" name="telpon" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="08xxxxxxxxxx" required>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Kategori</label>
                    <select name="kategori" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="akademik">Akademik</option>
                        <option value="non-akademik">Non-Akademik</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Status</label>
                    <select name="status" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all">
                        <option value="tinjau">Tinjau</option>
                        <option value="proses">Proses</option>
                        <option value="tolak">Tolak</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Deskripsi Laporan</label>
                    <textarea name="deskripsi_laporan" rows="4" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all resize-none placeholder-slate-500" placeholder="Jelaskan aspirasi secara detail..." required></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-400 mb-1.5 block">Pesan Balasan</label>
                    <textarea name="pesan_balasan" rows="3" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all resize-none placeholder-slate-500" placeholder="Opsional..."></textarea>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
                    <i class="bi bi-check-lg"></i> Simpan
                </button>
                <a href="{{ route('admin.serasi.index') }}" class="px-5 py-2.5 bg-slate-800 text-slate-300 text-sm font-medium rounded-xl hover:bg-slate-700 transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
