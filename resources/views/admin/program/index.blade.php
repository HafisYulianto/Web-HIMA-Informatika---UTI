@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Manajemen Program Kerja</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola data program unggulan HIMA Informatika</p>
        </div>
        <a href="{{ route('admin.program.create') }}" 
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
            <i class="bi bi-plus-lg"></i> Tambah Program
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
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Gambar</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Judul</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Deskripsi Singkat</th>
                        <th class="text-center px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($programs as $item)
                    <tr class="hover:bg-slate-800/40 transition-colors duration-150">
                        <td class="px-5 py-3.5">
                            @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-16 w-24 object-cover rounded-lg bg-white/10 p-1">
                            @else
                            <div class="h-16 w-24 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-500">
                                <i class="bi bi-image text-xl"></i>
                            </div>
                            @endif
                        </td>
                        <td class="px-5 py-3.5 text-white font-medium">{{ $item->judul }}</td>
                        <td class="px-5 py-3.5 text-slate-400 max-w-xs truncate">{{ $item->deskripsi }}</td>
                        <td class="px-5 py-3.5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.program.edit', $item->id) }}" 
                                    class="p-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500/20 transition-all" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.program.destroy', $item->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus program kerja ini?')" 
                                        class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all" title="Hapus">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-12 text-center">
                            <i class="bi bi-inbox text-4xl text-slate-600 mb-2 block"></i>
                            <p class="text-slate-500">Belum ada data program kerja</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        <div class="px-5 py-4 border-t border-slate-800">
            <div class="text-sm">
                {{ $programs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
