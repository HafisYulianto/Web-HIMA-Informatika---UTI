<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
    <div class="mb-4 px-4 py-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl text-emerald-400 text-sm">
        {{ session('status') }}
    </div>
    @endif

    {{-- Error Messages --}}
    @if ($errors->any())
    <div class="mb-4 px-4 py-3 bg-red-500/10 border border-red-500/20 rounded-xl text-red-400 text-sm">
        <div class="flex items-center gap-2">
            <i class="bi bi-exclamation-circle"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="text-xs font-medium text-slate-400 mb-1.5 block">Email</label>
            <div class="relative">
                <i class="bi bi-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full bg-slate-900 border border-slate-800 text-white rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500"
                    placeholder="admin@teknokrat.ac.id">
            </div>
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="text-xs font-medium text-slate-400 mb-1.5 block">Password</label>
            <div class="relative">
                <i class="bi bi-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full bg-slate-900 border border-slate-800 text-white rounded-xl pl-11 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 transition-all placeholder-slate-500"
                    placeholder="••••••••">
            </div>
        </div>

        {{-- Remember & Forgot --}}
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center gap-2 cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" 
                    class="w-4 h-4 rounded border-slate-700 bg-slate-900 text-red-600 focus:ring-red-500/50 focus:ring-offset-0">
                <span class="text-sm text-slate-400">Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-red-400 hover:text-red-300 transition-colors">
                Lupa password?
            </a>
            @endif
        </div>

        {{-- Login Button --}}
        <button type="submit" 
            class="w-full py-3 bg-gradient-to-r from-red-600 to-orange-500 text-white text-sm font-semibold rounded-xl hover:from-red-700 hover:to-orange-600 transition-all duration-300 shadow-lg shadow-red-500/20 flex items-center justify-center gap-2">
            <i class="bi bi-box-arrow-in-right"></i> Masuk
        </button>
    </form>
</x-guest-layout>
