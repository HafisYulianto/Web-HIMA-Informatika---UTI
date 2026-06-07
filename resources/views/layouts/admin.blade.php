<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMA IF Serasi - Admin</title>
    <link rel="icon" href="/build/assets/img/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-200 font-['Inter']">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 ml-72 p-8">
            {{-- Top Bar --}}
            <div class="flex items-center justify-between mb-8">
                <div>
                    <p class="text-sm text-slate-400">Selamat datang,</p>
                    <h2 class="text-xl font-bold text-white">{{ Auth::user()->name ?? 'Admin' }}</h2>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-400">{{ now()->translatedFormat('l, d F Y') }}</span>
                    <img src="/build/assets/img/logo.png" alt="Logo" class="w-10 h-10 rounded-full object-cover border-2 border-slate-700">
                </div>
            </div>

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Deteksi semua tombol atau tautan yang menggunakan confirm() bawaan browser
            const deleteButtons = document.querySelectorAll('button[onclick*="confirm"], a[onclick*="confirm"]');
            
            deleteButtons.forEach(button => {
                const onclickStr = button.getAttribute('onclick') || '';
                const match = onclickStr.match(/confirm\(['"](.*?)['"]\)/);
                if (match) {
                    const message = match[1];
                    
                    // Hapus onclick bawaan agar tidak memicu pop-up default browser
                    button.removeAttribute('onclick');
                    
                    // Tambahkan event listener custom menggunakan SweetAlert2
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const form = this.closest('form');
                        
                        // Menentukan judul dan isi teks pop-up berdasarkan kata kunci pesan
                        let title = 'Hapus Data?';
                        let text = message;
                        let confirmText = 'Ya, Hapus';
                        let icon = 'warning';
                        
                        const path = window.location.pathname.toLowerCase();
                        if (message.toLowerCase().includes('user') || path.includes('/users')) {
                            title = 'Hapus Pengguna?';
                            text = 'Apakah Anda yakin ingin menghapus akun pengguna ini?';
                        } else if (message.toLowerCase().includes('proyek') || path.includes('/our-project')) {
                            title = 'Hapus Proyek?';
                            text = 'Apakah Anda yakin ingin menghapus data proyek ini?';
                        } else if (message.toLowerCase().includes('divisi') || path.includes('/divisi')) {
                            title = 'Hapus Divisi?';
                            text = 'Apakah Anda yakin ingin menghapus data divisi ini?';
                        } else if (message.toLowerCase().includes('kabinet') || path.includes('/kabinet')) {
                            title = 'Hapus Kabinet?';
                            text = 'Apakah Anda yakin ingin menghapus data kabinet ini?';
                        } else if (message.toLowerCase().includes('program') || path.includes('/program')) {
                            title = 'Hapus Program Kerja?';
                            text = 'Apakah Anda yakin ingin menghapus data program kerja ini?';
                        } else if (message.toLowerCase().includes('komentar') || path.includes('/comment')) {
                            title = 'Hapus Komentar?';
                            text = 'Apakah Anda yakin ingin menghapus komentar/testimoni ini?';
                        } else if (message.toLowerCase().includes('aspirasi') || message.toLowerCase().includes('data') || path.includes('/serasi')) {
                            title = 'Hapus Data Aspirasi?';
                            text = 'Apakah Anda yakin ingin menghapus data laporan aspirasi ini?';
                        }
                        
                        Swal.fire({
                            title: title,
                            text: text,
                            icon: icon,
                            showCancelButton: true,
                            confirmButtonColor: '#ef4444', // red-500
                            cancelButtonColor: '#475569', // slate-600
                            confirmButtonText: confirmText,
                            cancelButtonText: 'Batal',
                            background: '#0f172a', // slate-900
                            color: '#f1f5f9', // slate-100
                            iconColor: '#f59e0b', // amber-500
                            customClass: {
                                popup: 'rounded-2xl border border-slate-800 shadow-xl'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (form) {
                                    form.submit();
                                } else {
                                    const href = button.getAttribute('href');
                                    if (href) window.location.href = href;
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
