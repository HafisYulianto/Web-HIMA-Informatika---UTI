<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HIMA Informatika</title>
  <meta name="description" content="Website resmi Himpunan Mahasiswa Informatika">
  <meta name="keywords" content="hima, informatika, mahasiswa, teknologi, programming">
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

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/build/assets/img/logo.png" alt="">
        <h1 class="sitename">HIMA INFORMATIKA</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#activities">Kegiatan</a></li>
          <li><a href="#divisi">Divisi</a></li>
          <li><a href="#our-project">Proyek Kami</a></li>
          <!-- <li><a href="#team">Pengurus</a></li> -->
          <li><a href="#contact">Kontak</a></li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="serasi">Serasi</a></li>
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

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <img src="/build/assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">
          <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            @if(isset($kabinet) && $kabinet->logo)
              <img src="{{ asset('storage/' . $kabinet->logo) }}" class="img-fluid animated" alt="{{ $kabinet->nama }}">
            @else
              <img src="/build/assets/img/hero-renascens2.png" class="img-fluid animated" alt="Hero HIMA IF">
            @endif
          </div>

          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1>Himpunan Mahasiswa <span>Informatika</span></h1>
            <p>Wadah pengembangan diri dan profesionalisme bagi mahasiswa informatika</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Jelajahi</a>

            </div>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>Tentang Kami</h3>
            <h2>Himpunan Mahasiswa Informatika</h2>
            <p>HIMA Informatika adalah organisasi mahasiswa yang mewadahi mahasiswa program studi informatika untuk mengembangkan potensi akademik, soft skills, dan profesionalisme di bidang teknologi informasi.</p>
            <a href="#" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-code-square" style="color: #ffbb2c;"></i>
                  <h3>Pengembangan Skill</h3>
                  <p>Meningkatkan kemampuan teknis dan non-teknis melalui berbagai pelatihan dan workshop</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-people" style="color: #5578ff;"></i>
                  <h3>Jaringan & Kolaborasi</h3>
                  <p>Memperluas jaringan dengan industri dan komunitas teknologi lainnya</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-lightbulb" style="color: #e80368;"></i>
                  <h3>Inovasi & Kreativitas</h3>
                  <p>Mendorong inovasi dan kreativitas dalam pengembangan solusi teknologi</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-award" style="color: #e361ff;"></i>
                  <h3>Prestasi</h3>
                  <p>Mendorong prestasi akademik dan non-akademik mahasiswa informatika</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Activities Section -->
    <section id="activities" class="features section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item">
              <i class="bi bi-code-slash" style="color: #ffbb2c;"></i>
              <h3><a href="" class="stretched-link">Coding Bootcamp</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item">
              <i class="bi bi-mic" style="color: #5578ff;"></i>
              <h3><a href="" class="stretched-link">Tech Talk</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item">
              <i class="bi bi-trophy" style="color: #e80368;"></i>
              <h3><a href="" class="stretched-link">Kompetisi</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item">
              <i class="bi bi-kanban" style="color: #e361ff;"></i>
              <h3><a href="" class="stretched-link">Project Based Learning</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item">
              <i class="bi bi-building" style="color: #47aeff;"></i>
              <h3><a href="" class="stretched-link">Kunjungan Industri</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item">
              <i class="bi bi-people" style="color: #ffa76e;"></i>
              <h3><a href="" class="stretched-link">Study Group</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="features-item">
              <i class="bi bi-calendar-event" style="color: #11dbcf;"></i>
              <h3><a href="" class="stretched-link">Seminar & Workshop</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
            <div class="features-item">
              <i class="bi bi-heart" style="color: #4233ff;"></i>
              <h3><a href="" class="stretched-link">Social Project</a></h3>
            </div>
          </div><!-- End Feature Item -->

        </div>

      </div>

    </section><!-- /Activities Section -->



    <!-- Details Section -->
    <section id="details" class="details section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Program Kerja</h2>
        <div><span>Program Unggulan</span> <span class="description-title">HIMA Informatika</span></div>
      </div><!-- End Section Title -->

      <div class="container">

        @forelse($programs as $program)
        <div class="row gy-4 align-items-center features-item mt-4">
          <div class="col-md-5 d-flex align-items-center {{ $loop->iteration % 2 == 0 ? 'order-md-last' : '' }}" data-aos="zoom-out" data-aos-delay="100">
            @if($program->gambar)
            <img src="{{ asset('storage/' . $program->gambar) }}" class="img-fluid" alt="{{ $program->judul }}">
            @else
            <img src="/build/assets/img/details-1.png" class="img-fluid" alt="{{ $program->judul }}">
            @endif
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3>{{ $program->judul }}</h3>
            <p class="fst-italic">
              {{ $program->deskripsi }}
            </p>
            <ul>
              @if($program->kegiatan_utama)
              <li><i class="bi bi-check"></i><span> <strong>Kegiatan Utama:</strong> {{ $program->kegiatan_utama }}</span></li>
              @endif
              @if($program->manfaat)
              <li><i class="bi bi-check"></i> <span><strong>Manfaat:</strong> {{ $program->manfaat }}</span></li>
              @endif
            </ul>
          </div>
        </div><!-- Features Item -->
        @empty
        <div class="text-center text-muted">
          <p>Belum ada program kerja yang ditambahkan.</p>
        </div>
        @endforelse
      </div>

    </section><!-- /Details Section -->

    <!-- Gallery Section -->
    <section id="divisi" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Divisi</h2>
        <div><span>Divisi</span> <span class="description-title">HIMA Informatika</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 justify-content-center">

          @forelse($divisis as $divisi)
          <div class="col-lg-4 col-md-6">
            <div class="text-center p-5 rounded-4 shadow-sm h-100 d-flex flex-column justify-content-center align-items-center divisi-card" style="background: linear-gradient(145deg, #ffffff, #f8f9fa); border: 1px solid #f0f0f0; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 30px rgba(220, 53, 69, 0.15)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)';">
              @if($divisi->logo)
              <img src="{{ asset('storage/' . $divisi->logo) }}" alt="Logo {{ $divisi->nama }}" class="img-fluid mb-3" style="width: 80px; height: 80px; object-fit: contain;">
              @endif
              <h3 class="fw-bold mb-0 text-uppercase" style="background: linear-gradient(135deg, #dc3545, #fd7e14); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 1.4rem; letter-spacing: 1.5px;">{{ $divisi->nama }}</h3>
            </div>
          </div>
          @empty
          <div class="col-12 text-center text-muted">
            <p>Belum ada data divisi yang ditambahkan.</p>
          </div>
          @endforelse

        </div>
        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Our Project Section -->
    <section id="our-project" class="section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Proyek</h2>
        <div><span>Proyek</span> <span class="description-title">Kami</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        @if(isset($ourProjects) && $ourProjects->count() > 0)
        <div class="row g-4">
          @foreach($ourProjects as $project)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="transition: all 0.4s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(220, 53, 69, 0.15)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)';">
              
              {{-- Project Image --}}
              <div style="position: relative; overflow: hidden; height: 220px; background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                @if($project->foto)
                <img src="{{ asset('storage/' . $project->foto) }}" alt="{{ $project->nama }}" 
                  style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" 
                  onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                @else
                <div class="d-flex align-items-center justify-content-center h-100" style="color: #ccc;">
                  <i class="bi bi-folder2-open" style="font-size: 3.5rem;"></i>
                </div>
                @endif

                {{-- Overlay Badge --}}
                <div style="position: absolute; top: 15px; left: 15px;">
                  <span class="badge rounded-pill px-3 py-2" style="background: linear-gradient(135deg, #dc3545, #fd7e14); font-size: 0.7rem; font-weight: 600; letter-spacing: 0.5px;">
                    <i class="bi bi-star-fill me-1"></i>PROYEK
                  </span>
                </div>
              </div>

              {{-- Project Body --}}
              <div class="card-body p-4">
                <h5 class="fw-bold mb-2" style="font-size: 1.15rem; color: #2c3e50;">{{ $project->nama }}</h5>
                <p class="text-muted mb-3" style="font-size: 0.88rem; line-height: 1.7; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {{ $project->deskripsi }}
                </p>
                @if($project->link)
                <a href="{{ $project->link }}" target="_blank" class="btn btn-sm rounded-pill px-4 py-2 fw-semibold" 
                  style="background: linear-gradient(135deg, #dc3545, #fd7e14); color: white; border: none; font-size: 0.8rem; transition: all 0.3s ease;" 
                  onmouseover="this.style.opacity='0.85'; this.style.transform='translateY(-2px)';" 
                  onmouseout="this.style.opacity='1'; this.style.transform='none';">
                  <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Project
                </a>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="text-center text-muted py-5">
          <i class="bi bi-folder2-open" style="font-size: 3rem; color: #ddd;"></i>
          <p class="mt-3">Belum ada project yang ditambahkan.</p>
        </div>
        @endif

      </div>

    </section><!-- /Our Project Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

      <img src="/build/assets/img/testimonials-bg.jpeg" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/build/assets/img/profile.png" class="testimonial-img" alt="">
                <h3>Budi Santoso</h3>
                <h4>Ade Chandra 2022</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>HIMA Informatika telah memberikan saya pengalaman berharga dalam kepemimpinan dan manajemen organisasi. Skill yang saya dapatkan sangat berguna untuk karir saya sekarang.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/build/assets/img/profile.png" class="testimonial-img" alt="">
                <h3>Dela Se</h3>
                <h4>Anggota Aktif</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Melalui berbagai workshop dan pelatihan yang diadakan HIMA, saya bisa mengembangkan skill programming yang langsung applicable di dunia kerja. Senang sekali bisa menjadi bagian dari komunitas ini.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/build/assets/img/profile.png" class="testimonial-img" alt="">
                <h3>Risma IF 22 Dx</h3>
                <h4>Koordinator Acara</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Mengorganisir Tech Week 2023 adalah pengalaman yang menantang namun sangat memuaskan. Saya belajar banyak tentang event management dan jaringan profesional di industri teknologi.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <div><span>Hubungi</span> <span class="description-title">Kami</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Alamat</h3>
                <p>Gedung ICT C - Universitas Teknokrat Indonesia</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>hima_informatika@teknokrat.ac.id</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-instagram flex-shrink-0"></i>
              <div>
                <h3>Instagram</h3>
                <p><a href="https://www.instagram.com/hima_informatika_uti/" target="_blank">@hima_informatika_uti</a></p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8 d-flex align-items-center justify-content-center">
            <div class="text-center w-100 p-5 bg-white shadow-sm rounded-4 border border-light">
              <i class="bi bi-envelope-paper text-danger mb-3" style="font-size: 3rem;"></i>
              <h3 class="fw-bold mb-3">Punya Pertanyaan atau Keluhan?</h3>
              <p class="text-muted mb-4">Silakan hubungi kami secara langsung melalui email HIMA Informatika. Kami akan dengan senang hati merespons pesan Anda.</p>
              <a href="mailto:hima_informatika@teknokrat.ac.id" class="btn btn-danger btn-lg px-5 py-3 rounded-pill fw-bold shadow-sm" style="background: linear-gradient(135deg, #dc3545, #fd7e14); border: none;">
                <i class="bi bi-envelope-at me-2"></i> Kirim Email Sekarang
              </a>
            </div>
          </div><!-- End Contact Info Box -->

        </div>

      </div>

    </section><!-- /Contact Section -->




  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4 justify-content-between">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="/" class="logo d-flex align-items-center mb-3">
            <span class="sitename" style="font-size: 1.8rem; font-weight: 700; background: linear-gradient(135deg, #fff, #f8a1a1); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">HIMA Informatika</span>
          </a>
          <p class="text-white-50 mb-4">Wadah pengembangan diri dan profesionalisme bagi mahasiswa informatika Universitas Teknokrat Indonesia.</p>
          <div class="footer-contact pt-3">
            <p><strong>Gedung ICT C</strong></p>
            <p>Universitas Teknokrat Indonesia</p>
            <p class="mt-3"><strong>Email:</strong> <span>hima_informatika@teknokrat.ac.id</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://www.instagram.com/hima_informatika_uti/" target="_blank" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); border: none;"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Tautan</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#activities">Kegiatan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#divisi">Divisi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#our-project">Proyek Kami</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#contact">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Layanan</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="serasi">Serasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://app.himaif.web.id/" target="_blank">Penilaian Keaktifan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://sertifikat-generator-hima-informati.vercel.app/" target="_blank">Sertifikat Generator</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Divisi Kami</h4>
          <ul>
            @forelse($divisis as $divisi)
            <li><i class="bi bi-chevron-right"></i> <a href="#divisi">{{ $divisi->nama }}</a></li>
            @empty
            <li><i class="bi bi-chevron-right"></i> <span class="text-white-50">Belum ada divisi</span></li>
            @endforelse
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">HIMA Informatika</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Developed by <a href="https://portfolio-hafisyulianto.vercel.app/">HY</a>
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