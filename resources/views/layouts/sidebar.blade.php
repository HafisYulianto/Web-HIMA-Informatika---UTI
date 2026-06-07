<aside class="fixed top-0 left-0 w-72 h-screen bg-slate-900 border-r border-slate-800 z-50 flex flex-col">
    {{-- Logo & Brand --}}
    <div class="px-6 py-6 border-b border-slate-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-600 to-orange-500 flex items-center justify-center shadow-lg shadow-red-500/20">
                <i class="bi bi-shield-check text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-lg font-bold text-white leading-tight">HIMA IF</h1>
                <p class="text-xs text-slate-400 -mt-0.5">Serasi Admin Panel</p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6 overflow-y-auto">
        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-3 px-3">Menu Utama</p>

        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('admin.dashboard') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-grid-1x2-fill text-base"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.serasi.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.serasi.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-chat-left-text-fill text-base"></i>
            Data Aspirasi
        </a>

        <a href="{{ route('admin.users.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.users.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-people-fill text-base"></i>
            Manajemen User
        </a>

        <a href="{{ route('admin.divisi.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.divisi.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-diagram-3-fill text-base"></i>
            Manajemen Divisi
        </a>

        <a href="{{ route('admin.kabinet.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.kabinet.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-star-fill text-base"></i>
            Manajemen Kabinet
        </a>

        <a href="{{ route('admin.program.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.program.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-rocket-takeoff-fill text-base"></i>
            Manajemen Program
        </a>

        <a href="{{ route('admin.our-project.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.our-project.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-folder-fill text-base"></i>
            Manajemen Proyek
        </a>

        <a href="{{ route('admin.comment.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 mt-1
            {{ request()->routeIs('admin.comment.*') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-chat-left-text-fill text-base"></i>
            Manajemen Komentar
        </a>

        <div class="my-6 border-t border-slate-800"></div>
        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-3 px-3">Akun</p>

        <a href="{{ route('profile.edit') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
            {{ request()->routeIs('profile.edit') 
                ? 'bg-gradient-to-r from-red-600/20 to-orange-500/10 text-red-400 border border-red-500/20 shadow-sm' 
                : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
            <i class="bi bi-person-circle text-base"></i>
            Profil
        </a>

        <a href="/" target="_blank"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-800 transition-all duration-200 mt-1">
            <i class="bi bi-box-arrow-up-right text-base"></i>
            Lihat Website
        </a>
    </nav>

    {{-- User Info & Logout --}}
    <div class="px-4 py-4 border-t border-slate-800">
        <div class="flex items-center gap-3 mb-3 px-2">
            <img src="/build/assets/img/logo.png" alt="Logo" class="w-9 h-9 rounded-full object-cover flex-shrink-0">
            <div class="min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email ?? '' }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-xl text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all duration-200">
                <i class="bi bi-box-arrow-left text-base"></i>
                Logout
            </button>
        </form>
    </div>
</aside>
