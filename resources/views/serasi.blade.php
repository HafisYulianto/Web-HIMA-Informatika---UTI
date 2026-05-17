<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HIMA Informatika - Serasi</title>
  <meta name="description" content="Website resmi Himpunan Mahasiswa Informatika - Formulir Serasi">
  <meta name="keywords" content="hima, informatika, mahasiswa, teknologi, programming, serasi, aspirasi">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Favicons -->
  <link href="/build/assets/img/logo.png" rel="icon">
  <link href="/build/assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/build/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/build/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/build/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/build/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/build/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/build/assets/css/main.css" rel="stylesheet">

</head>

<body class="bg-gray-100 text-gray-900 antialiased">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/build/assets/img/logo.png" alt="">
        <h1 class="sitename ms-2">HIMA INFORMATIKA</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/#hero">Beranda</a></li>
          <li><a href="/#about">Tentang</a></li>
          <li><a href="/#activities">Kegiatan</a></li>
          <li><a href="/#gallery">Galeri</a></li>
          <!-- <li><a href="/#team">Pengurus</a></li> -->
          <li><a href="/#contact">Kontak</a></li>
          <li class="dropdown"><a href="#" class="active"><span>Service</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="serasi" class="active">Serasi</a></li>
              <li><a href="https://app.himaif.web.id/" target="_blank">Penilaian Keaktifan Anggota</a></li>
              <li><a href="https://sertifikat-generator-hima-informati.vercel.app/" target="_blank">Sertifikat Generator</a></li>
            </ul>
          </li>
          <li><a href="/login" style="background: rgba(255,255,255,0.15); border-radius: 50px; padding: 8px 20px; margin-left: 15px; border: 1px solid rgba(255,255,255,0.3); transition: 0.3s;"><i class="bi bi-person-circle me-1"></i> Admin</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
    <section id="hero" class="hero section ">

  <div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-center text-red-700 mb-8">Formulir Serasi - Serap Aspirasi</h1>

    {{-- Flash Message --}}
    @if(session('success'))
    <div class="mb-6 p-4 rounded bg-green-100 text-green-800 shadow">
      {{ session('success') }}
    </div>
    @endif

    {{-- Form Input --}}
    <form method="POST" action="{{ route('serasi.store') }}" class="bg-white p-6 rounded-lg shadow-md mb-10">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <input type="text" name="nama" placeholder="Nama" class="form-input" required>
        <input type="text" name="npm" placeholder="NPM" class="form-input" required>
        <input type="email" name="email" placeholder="Email" class="form-input" required>
        <input type="text" name="telpon" placeholder="Telpon" class="form-input" required>
        <select name="kategori" class="form-select" required>
          <option value="">-- Pilih Kategori --</option>
          <option value="akademik">Akademik</option>
          <option value="non-akademik">Non-Akademik</option>
        </select>
      </div>
      <div class="mt-4">
        <textarea name="deskripsi_laporan" rows="4" class="form-textarea w-full" placeholder="Deskripsi Laporan" required></textarea>
      </div>
      <button type="submit" class="mt-6 px-6 py-2 bg-red-800 text-white font-semibold rounded hover:bg-red-700 transition">
        Kirim Aspirasi
      </button>
    </form>

    {{-- Filter Form --}}
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Daftar Aspirasi</h2>
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
      <input type="text" name="search" placeholder="Cari nama, NPM, email" value="{{ request('search') }}"
        class="form-input">

      <select name="kategori" class="form-select">
        <option value="">Semua Kategori</option>
        <option value="akademik" {{ request('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
        <option value="non-akademik" {{ request('kategori') == 'non-akademik' ? 'selected' : '' }}>Non-Akademik</option>
      </select>

      <select name="status" class="form-select">
        <option value="">Semua Status</option>
        <option value="tinjau" {{ request('status') == 'tinjau' ? 'selected' : '' }}>Tinjau</option>
        <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
        <option value="tolak" {{ request('status') == 'tolak' ? 'selected' : '' }}>Tolak</option>
        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
      </select>

      <button type="submit" class="bg-red-800 text-white px-4 py-2 rounded hover:bg-red-700 transition">
        Filter
      </button>
    </form>

    {{-- Tabel Data --}}
    <div class="overflow-auto bg-white rounded-lg shadow-md">
      @if ($serasiList->isEmpty())
      <p class="p-6 text-center text-gray-500">Belum ada data aspirasi.</p>
      @else
      <table class="min-w-full table-auto divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-gray-600">
          <tr>
            <th class="px-4 py-2 text-left font-medium">Nama</th>
            <th class="px-4 py-2 text-left font-medium">NPM</th>
            <th class="px-4 py-2 text-left font-medium">Email</th>
            <th class="px-4 py-2 text-left font-medium">Telpon</th>
            <th class="px-4 py-2 text-left font-medium">Kategori</th>
            <th class="px-4 py-2 text-left font-medium">Deskripsi</th>
            <th class="px-4 py-2 text-left font-medium">Status</th>
            <th class="px-4 py-2 text-left font-medium">Pesan Balasan</th>
            <th class="px-4 py-2 text-left font-medium">Tanggal</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($serasiList as $serasi)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2">{{ $serasi->nama }}</td>
            <td class="px-4 py-2">{{ $serasi->npm }}</td>
            <td class="px-4 py-2">{{ $serasi->email }}</td>
            <td class="px-4 py-2">{{ $serasi->telpon }}</td>
            <td class="px-4 py-2">{{ ucfirst($serasi->kategori) }}</td>
            <td class="px-4 py-2">{{ $serasi->deskripsi_laporan }}</td>
            <td class="px-4 py-2">
              <span class="inline-block px-2 py-1 text-xs rounded font-medium 
                                {{ $serasi->status == 'selesai' ? 'bg-green-200 text-green-800' : 
                                   ($serasi->status == 'proses' ? 'bg-blue-200 text-blue-800' :
                                   ($serasi->status == 'tolak' ? 'bg-red-200 text-red-800' : 'bg-yellow-100 text-yellow-800')) }}">
                {{ ucfirst($serasi->status) }}
              </span>
            </td>
            <td class="px-4 py-2">{{ $serasi->pesan_balasan ?? '-' }}</td>
            <td class="px-4 py-2">{{ $serasi->created_at->format('d M Y') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- Footer Pagination + Per Page --}}
      <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-4">
        {{-- Dropdown per_page --}}
        <form method="GET" class="flex items-center gap-2">
          <label for="per_page" class="text-sm text-gray-700">Tampilkan</label>
          <select name="per_page" id="per_page" onchange="this.form.submit()" class="form-select w-20 text-sm rounded">
            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
          </select>
          <span class="text-sm text-gray-700">data per halaman</span>

          {{-- Tetap kirim query filter --}}
          @foreach(request()->except(['per_page', 'page']) as $name => $value)
          <input type="hidden" name="{{ $name }}" value="{{ $value }}">
          @endforeach
        </form>

        {{-- Pagination --}}
        <div class="text-sm">
          {{ $serasiList->links() }}
        </div>
      </div>
      @endif
    </div>
  </div>
    </section><!-- /Hero Section -->

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">HIMA Informatika</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Gedung ICT C - Universitas Teknokrat Indonesia</p>
            <p><strong>Email:</strong> <span>hima_informatika@teknokrat.ac.id</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://www.instagram.com/hima_informatika_uti/" target="_blank"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Tautan Berguna</h4>
          <ul>
            <li><a href="/#hero">Beranda</a></li>
            <li><a href="/#about">Tentang Kami</a></li>
            <li><a href="/#activities">Kegiatan</a></li>
            <li><a href="/#gallery">Galeri</a></li>
            <li><a href="/#contact">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Program Kami</h4>
          <ul>
            <li><a href="#">Coding Bootcamp</a></li>
            <li><a href="#">Tech Talk</a></li>
            <li><a href="#">Kompetisi</a></li>
            <li><a href="#">Workshop</a></li>
            <li><a href="#">Study Group</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Newsletter Kami</h4>
          <p>Berlangganan newsletter kami untuk mendapatkan informasi terbaru tentang kegiatan dan event HIMA Informatika!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email" placeholder="Email Anda"><input type="submit" value="Berlangganan"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Permintaan berlangganan Anda telah terkirim. Terima kasih!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">HIMA Informatika</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Developed by <a href="https://portfolio-hafisyulianto.vercel.app/">Hafis Yulianto</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/build/assets/vendor/php-email-form/validate.js"></script>
  <script src="/build/assets/vendor/aos/aos.js"></script>
  <script src="/build/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/build/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/build/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/build/assets/js/main.js"></script>
</body>

</html>