@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Data Aspirasi</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola semua aspirasi mahasiswa</p>
        </div>
        <a href="{{ route('admin.serasi.create') }}" 
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
            <i class="bi bi-plus-lg"></i> Tambah Aspirasi
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="flex items-center gap-3 px-4 py-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- Filter --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <form method="GET" action="{{ route('admin.serasi.index') }}" class="flex flex-col md:flex-row md:items-end gap-4">
            <div class="flex-1">
                <label class="text-xs font-medium text-slate-400 mb-1.5 block">Pencarian</label>
                <div class="relative">
                    <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, NPM, email..."
                        class="w-full bg-slate-800 border border-slate-700 text-white placeholder-slate-500 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all">
                </div>
            </div>
            <div class="w-full md:w-44">
                <label class="text-xs font-medium text-slate-400 mb-1.5 block">Kategori</label>
                <select name="kategori"
                    class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all">
                    <option value="">Semua</option>
                    <option value="akademik" {{ request('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                    <option value="non-akademik" {{ request('kategori') == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
                </select>
            </div>
            <div class="w-full md:w-44">
                <label class="text-xs font-medium text-slate-400 mb-1.5 block">Status</label>
                <select name="status"
                    class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all">
                    <option value="">Semua</option>
                    <option value="tinjau" {{ request('status') == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="tolak" {{ request('status') == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-xl transition-all duration-200">
                <i class="bi bi-funnel-fill mr-1"></i> Filter
            </button>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-800">
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">NPM</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Email</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Telpon</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Kategori</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Deskripsi</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Balasan</th>
                        <th class="text-center px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($serasiList as $item)
                    <tr class="hover:bg-slate-800/40 transition-colors duration-150">
                        <td class="px-5 py-3.5 text-white font-medium">{{ $item->nama }}</td>
                        <td class="px-5 py-3.5 text-slate-300">{{ $item->npm }}</td>
                        <td class="px-5 py-3.5 text-slate-300">{{ $item->email }}</td>
                        <td class="px-5 py-3.5 text-slate-300">{{ $item->telpon }}</td>
                        <td class="px-5 py-3.5">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-lg
                                {{ $item->kategori == 'akademik' ? 'bg-blue-500/10 text-blue-400' : 'bg-purple-500/10 text-purple-400' }}">
                                {{ ucfirst($item->kategori) }}
                            </span>
                        </td>
                        <td class="px-5 py-3.5 text-slate-300 max-w-[200px] truncate">{{ $item->deskripsi_laporan }}</td>
                        <td class="px-5 py-3.5">
                            @php
                                $statusStyles = [
                                    'tinjau' => 'bg-yellow-500/10 text-yellow-400',
                                    'proses' => 'bg-blue-500/10 text-blue-400',
                                    'tolak' => 'bg-red-500/10 text-red-400',
                                    'selesai' => 'bg-emerald-500/10 text-emerald-400',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-lg {{ $statusStyles[$item->status] ?? '' }}">
                                <span class="w-1.5 h-1.5 rounded-full mr-1.5 
                                    {{ $item->status == 'tinjau' ? 'bg-yellow-400' : ($item->status == 'proses' ? 'bg-blue-400' : ($item->status == 'tolak' ? 'bg-red-400' : 'bg-emerald-400')) }}"></span>
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-5 py-3.5 text-slate-400 max-w-[150px] truncate">{{ $item->pesan_balasan ?? '-' }}</td>
                        <td class="px-5 py-3.5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.serasi.edit', $item->id) }}" 
                                    class="p-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500/20 transition-all" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.serasi.destroy', $item->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data ini?')" 
                                        class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all" title="Hapus">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-5 py-12 text-center">
                            <i class="bi bi-inbox text-4xl text-slate-600 mb-2 block"></i>
                            <p class="text-slate-500">Belum ada data aspirasi</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 px-5 py-4 border-t border-slate-800">
            <form method="GET" class="flex items-center gap-2">
                <span class="text-sm text-slate-400">Tampilkan</span>
                <select name="per_page" onchange="this.form.submit()" 
                    class="bg-slate-800 border border-slate-700 text-white text-sm rounded-lg px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-red-500/50">
                    @foreach([5, 10, 25, 50] as $num)
                    <option value="{{ $num }}" {{ request('per_page') == $num ? 'selected' : '' }}>{{ $num }}</option>
                    @endforeach
                </select>
                <span class="text-sm text-slate-400">per halaman</span>
                @foreach(request()->except(['per_page', 'page']) as $name => $value)
                <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
            </form>
            <div class="text-sm">
                {{ $serasiList->links() }}
            </div>
        </div>
    </div>
</div>
@endsection