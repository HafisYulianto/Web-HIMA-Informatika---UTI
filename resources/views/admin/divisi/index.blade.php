@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Manajemen Divisi</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola data divisi HIMA Informatika</p>
        </div>
        <a href="{{ route('admin.divisi.create') }}" 
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
            <i class="bi bi-plus-lg"></i> Tambah Divisi
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="flex items-center gap-3 px-4 py-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- Table --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-800">
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Logo</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama Divisi</th>
                        <th class="text-center px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($divisis as $item)
                    <tr class="hover:bg-slate-800/40 transition-colors duration-150">
                        <td class="px-5 py-3.5">
                            @if($item->logo)
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="Logo {{ $item->nama }}" class="w-12 h-12 object-contain rounded-lg bg-white/10 p-1">
                            @else
                            <div class="w-12 h-12 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-500">
                                <i class="bi bi-image"></i>
                            </div>
                            @endif
                        </td>
                        <td class="px-5 py-3.5 text-white font-medium">{{ $item->nama }}</td>
                        <td class="px-5 py-3.5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.divisi.edit', $item->id) }}" 
                                    class="p-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500/20 transition-all" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.divisi.destroy', $item->id) }}" class="inline">
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
                        <td colspan="3" class="px-5 py-12 text-center">
                            <i class="bi bi-inbox text-4xl text-slate-600 mb-2 block"></i>
                            <p class="text-slate-500">Belum ada data divisi</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        <div class="px-5 py-4 border-t border-slate-800">
            <div class="text-sm">
                {{ $divisis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
