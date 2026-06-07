@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Manajemen Komentar</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola komentar dan testimoni dari pengunjung website</p>
        </div>
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
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Pengirim</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Jabatan/Angkatan</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Rating</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider w-1/3">Komentar</th>
                        <th class="text-left px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal Kirim</th>
                        <th class="text-center px-5 py-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($comments as $item)
                    <tr class="hover:bg-slate-800/40 transition-colors duration-150">
                        <td class="px-5 py-3.5 text-white font-medium">{{ $item->nama }}</td>
                        <td class="px-5 py-3.5 text-slate-400">{{ $item->posisi }}</td>
                        <td class="px-5 py-3.5 text-amber-400">
                            <div class="flex items-center gap-0.5">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $item->bintang)
                                        <i class="bi bi-star-fill text-xs"></i>
                                    @else
                                        <i class="bi bi-star text-xs text-slate-600"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td class="px-5 py-3.5 text-slate-300">
                            <p class="line-clamp-2" title="{{ $item->komentar }}">{{ $item->komentar }}</p>
                        </td>
                        <td class="px-5 py-3.5 text-slate-500 text-xs">
                            {{ $item->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-5 py-3.5 text-center">
                            <div class="flex items-center justify-center">
                                <form method="POST" action="{{ route('admin.comment.destroy', $item->id) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus komentar ini?')" 
                                        class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all text-xs" title="Hapus">
                                        <i class="bi bi-trash3 mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center">
                            <i class="bi bi-chat-left-dots text-4xl text-slate-600 mb-2 block"></i>
                            <p class="text-slate-500">Belum ada komentar dari pengguna</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        <div class="px-5 py-4 border-t border-slate-800">
            <div class="text-sm">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
