@extends('layouts.admin')

@section('content')
<div class="max-w-xl">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1 text-sm text-slate-400 hover:text-white transition-colors mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-white">Tambah User</h1>
        <p class="text-sm text-slate-400 mt-1">Buat akun admin baru</p>
    </div>

    @if ($errors->any())
    <div class="mb-5 px-4 py-3 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400 text-sm">
        <ul class="list-disc pl-4 space-y-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="text-xs font-medium text-slate-400 mb-1.5 block">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="Nama lengkap" required>
            </div>
            <div>
                <label class="text-xs font-medium text-slate-400 mb-1.5 block">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="email@example.com" required>
            </div>
            <div>
                <label class="text-xs font-medium text-slate-400 mb-1.5 block">Password</label>
                <input type="password" name="password" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500" placeholder="Minimal 6 karakter" required>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20">
                    <i class="bi bi-person-plus-fill"></i> Simpan
                </button>
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 bg-slate-800 text-slate-300 text-sm font-medium rounded-xl hover:bg-slate-700 transition-all">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
