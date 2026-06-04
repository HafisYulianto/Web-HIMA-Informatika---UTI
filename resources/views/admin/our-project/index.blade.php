@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Manage Our Project</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola data project yang akan ditampilkan di website</p>
        </div>
        <a href="{{ route('admin.our-project.create') }}" 
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
            <i class="bi bi-plus-lg"></i> Tambah Project
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="flex items-center gap-3 px-4 py-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- Cards Grid --}}
    @if($projects->isEmpty())
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-12 text-center">
        <i class="bi bi-folder2-open text-5xl text-slate-600 mb-3 block"></i>
        <p class="text-slate-500 text-lg">Belum ada data project</p>
        <p class="text-slate-600 text-sm mt-1">Klik tombol "Tambah Project" untuk memulai</p>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($projects as $project)
        <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden group hover:border-slate-700 transition-all duration-300">
            {{-- Image --}}
            <div class="relative aspect-video bg-slate-800 overflow-hidden">
                @if($project->foto)
                <img src="{{ asset('storage/' . $project->foto) }}" alt="{{ $project->nama }}" 
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                <div class="w-full h-full flex flex-col items-center justify-center text-slate-600">
                    <i class="bi bi-image text-4xl mb-2"></i>
                    <span class="text-xs">Tidak ada foto</span>
                </div>
                @endif
                {{-- Action Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-end p-3 gap-2">
                    <a href="{{ route('admin.our-project.edit', $project->id) }}" 
                        class="p-2.5 rounded-xl bg-blue-500/90 text-white hover:bg-blue-600 transition-all shadow-lg" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form method="POST" action="{{ route('admin.our-project.destroy', $project->id) }}" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus project ini?')" 
                            class="p-2.5 rounded-xl bg-red-500/90 text-white hover:bg-red-600 transition-all shadow-lg" title="Hapus">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>
                </div>
            </div>
            {{-- Content --}}
            <div class="p-5 space-y-3">
                <h3 class="text-white font-semibold text-lg leading-tight line-clamp-1">{{ $project->nama }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed line-clamp-2">{{ $project->deskripsi }}</p>
                @if($project->link)
                <a href="{{ $project->link }}" target="_blank" 
                    class="inline-flex items-center gap-1.5 text-xs font-medium text-red-400 hover:text-red-300 transition-colors">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Project
                </a>
                @endif
                <div class="pt-3 border-t border-slate-800 flex items-center justify-between">
                    <span class="text-xs text-slate-500">{{ $project->created_at->format('d M Y') }}</span>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.our-project.edit', $project->id) }}" 
                            class="p-1.5 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500/20 transition-all text-xs" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.our-project.destroy', $project->id) }}" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus project ini?')" 
                                class="p-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all text-xs" title="Hapus">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        <div class="text-sm">
            {{ $projects->links() }}
        </div>
    </div>
    @endif

</div>
@endsection
