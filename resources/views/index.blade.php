@php
$role = auth()->check() ? auth()->user()->role : null;
$dashboardRoute = match($role) {
'admin' => route('admin.dashboard'),
'staff' => route('staff.dashboard'),
default => route('dashboard.index'),
};
$submissionsRoute = $role === 'user' ? route('dashboard.submissions') : $dashboardRoute;
$complaintsRoute = $role === 'user' ? route('dashboard.complaints') : $dashboardRoute;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title  -->
  <title>Tailwind News Template | Tailnews</title>
  <meta name="description" content="Tailwind CSS News Template">

  <!-- Development css -->
  <link rel="stylesheet" href="assets/landing_page/src/css/style.css">

  <!-- Production css -->
  <!-- <link rel="stylesheet" href="dist/css/style.css"> -->

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

  <!-- Favicon  -->
  <link rel="icon" href="assets/landing_page/src/img/favicon.jpg">
</head>

<body class="text-gray-700 pt-9 sm:pt-10">
  <!-- ========== { HEADER }==========  -->
  <header class="fixed top-0 left-0 right-0 z-50">
    <nav style="background-color: #07213e;">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex justify-between">
          <div class="flex items-center gap-3 py-2 sm:py-3">
            <a href="#beranda" class="flex items-center">
              <img
                src="{{ asset('assets/landing_page/src/img/kemenkumham.png') }}"
                alt="Logo"
                style="height: 45px; width: auto;">
              <div style="margin-left: 10px; display: flex; flex-direction: column;">
                <span style="font-size: 14px; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.3;">Kantor Wilayah</span>
                <span style="font-size: 12px; font-weight: 400; color: white; line-height: 1.3;">Direktorat Jenderal Pemasyarakatan Jabar</span>
              </div>
            </a>
          </div>

          <div class="flex flex-row">
            <!-- nav menu -->
            <ul class="navbar hidden lg:flex lg:flex-row text-gray-400 text-sm items-center font-bold">
              <li class="active relative border-l border-gray-800 hover:bg-gray-900">
                <a class="block py-3 px-6 border-b-2 border-transparent" href="#beranda">Beranda</a>
              </li>
              <li class="dropdown relative border-l border-gray-800 hover:bg-gray-900">
                <a class="block py-3 px-6 border-b-2 border-transparent" href="#">Layanan</a>

                <ul class="dropdown-menu font-normal absolute left-0 right-auto top-full z-50 border-b-0 text-left bg-white text-gray-700 border border-gray-100" style="min-width: 12rem;">
                  <li class="subdropdown relative hover:bg-gray-50">
                    <a class="block py-2 px-6 border-b border-gray-100" href="#">
                      Pengajuan
                    </a>

                    <!--dropdown submenu-->
                    <ul class="dropdown-menu absolute left-full right-auto transform top-full z-50 border-b-0 text-left -mt-10 ml-0 mr-0 bg-white border border-gray-100" style="min-width: 12rem;">
                      <li class="relative hover:bg-gray-50"><a class="block py-2 px-6 border-b border-gray-100" href="{{ $submissionsRoute }}">Pengajuan Magang</a></li>
                      <li class="relative hover:bg-gray-50"><a class="block py-2 px-6 border-b border-gray-100" href="{{ $submissionsRoute }}">Pengajuan PKL</a></li>
                      <li class="relative hover:bg-gray-50"><a class="block py-2 px-6 border-b border-gray-100" href="{{ $submissionsRoute }}">Pengajuan Penelitian</a></li>
                    </ul>
                  </li>

                  <li class="subdropdown relative hover:bg-gray-50">
                    <a class="block py-2 px-6 border-b border-gray-100" href="#">
                      Pengaduan
                    </a>

                    <!--dropdown submenu-->
                    <ul class="dropdown-menu absolute left-full right-auto transform top-full z-50 border-b-0 text-left -mt-10 ml-0 mr-0 bg-white border border-gray-100" style="min-width: 12rem;">
                      <li class="relative hover:bg-gray-50"><a class="block py-2 px-6 border-b border-gray-100" href="{{ $complaintsRoute }}">Pengaduan Pelayanan</a></li>
                      <li class="relative hover:bg-gray-50"><a class="block py-2 px-6 border-b border-gray-100" href="{{ $complaintsRoute }}">Pengaduan Sistem</a></li>
                    </ul>
                  </li>

                  <li class="subdropdown relative hover:bg-gray-50">
                    <a class="block py-2 px-6 border-b border-gray-100" href="#">
                      Panduan
                    </a>

                    <!--dropdown submenu-->
                    <ul class="dropdown-menu absolute left-full right-auto transform top-full z-50 border-b-0 text-left -mt-10 ml-0 mr-0 bg-white border border-gray-100" style="min-width: 12rem;">

                      <li class="relative hover:bg-gray-50">
                        <a
                          class="block py-2 px-6 border-b border-gray-100"
                          href="{{ asset('files/panduan/panduan-1.jpg') }}"
                          download>
                          Cara Pengajuan
                        </a>
                      </li>

                      <li class="relative hover:bg-gray-50">
                        <a
                          class="block py-2 px-6 border-b border-gray-100"
                          href="{{ asset('files/panduan/panduan-2.jpg') }}"
                          download>
                          Cara Pengaduan
                        </a>
                      </li>

                    </ul>

                  </li>
                </ul>
              </li>
              <li class="relative border-l border-gray-800 hover:bg-gray-900">
                <a class="block py-3 px-6 border-b-2 border-transparent" href="#informasi">Informasi</a>
              </li>
              <li class="relative border-l border-gray-800 hover:bg-gray-900">
                <a class="block py-3 px-6 border-b-2 border-transparent" href="#galeri">Galeri</a>
              </li>
              <li class="relative border-l border-gray-800 hover:bg-gray-900">
                <a class="block py-3 px-6 border-b-2 border-transparent" href="#berita">Berita</a>
              </li>
              <li class="relative border-l border-gray-800 hover:bg-gray-900">
                <a class="block py-3 px-6 border-b-2 border-transparent" href="#footer-content">Kontak</a>
              </li>
            </ul>

            <!-- search form & mobile nav -->
            <div class="flex flex-row items-center text-gray-300">
              <div class="search-dropdown relative border-r lg:border-l border-gray-800 hover:bg-gray-900">
                <button class="block py-3 px-6 border-b-2 border-transparent">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="open bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close bi bi-x-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                  </svg>
                </button>
                <div class="dropdown-menu absolute left-auto right-0 top-full z-50 text-left bg-white text-gray-700 border border-gray-100 mt-1 p-3" style="min-width: 15rem;">
                  <div class="flex flex-wrap items-stretch w-full relative">
                    <input type="text" class="flex-shrink flex-grow flex-shrink max-w-full leading-5 w-px flex-1 relative py-2 px-5 text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0" name="text" placeholder="Search..." aria-label="search">
                    <div class="flex -mr-px">
                      <button class="flex items-center py-2 px-5 -ml-1 leading-5 text-gray-100 bg-black hover:text-white hover:bg-gray-900 hover:ring-0 focus:outline-none focus:ring-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="relative hover:bg-gray-800 block lg:hidden">
                <button type="button" class="menu-mobile block py-3 px-6 border-b-2 border-transparent">
                  <span class="sr-only">Mobile menu</span>
                  <svg class="inline-block h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                  </svg> Menu
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header><!-- end header -->

  <!-- Mobile menu -->
  <div class="side-area fixed w-full h-full inset-0 z-50">
    <!-- bg open -->
    <div class="back-menu fixed bg-gray-900 bg-opacity-70 w-full h-full inset-x-0 top-0">
      <div class="cursor-pointer text-white absolute right-64 p-2">
        <svg class="bi bi-x" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"></path>
          <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"></path>
        </svg>
      </div>
    </div>

    <!-- Mobile navbar -->
    <nav id="mobile-nav" class="side-menu flex flex-col right-0 w-64 fixed top-0 bg-white h-full overflow-auto z-40">
      <div class="mb-auto">
        <!--navigation-->
        <nav class="relative flex flex-wrap">
          <div class="text-center py-4 w-full font-bold border-b border-gray-100">TAILNEWS</div>
          <ul id="side-menu" class="w-full float-none flex flex-col">
            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Beranda</a>
            </li>

            <!-- dropdown with submenu-->
            <li class="dropdown relative">
              <a class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="javascript:;">
                Layanan
              </a>

              <!-- dropdown menu -->
              <ul class="dropdown-menu block rounded rounded-t-none top-full z-50 ml-4 py-0.5 text-left bg-white mb-4" style="min-width: 12rem">
                <!--submenu-->
                <li class="subdropdown relative">
                  <a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="javascript:;">
                    Dropdown item
                  </a>

                  <!--dropdown submenu-->
                  <ul class="dropdown-menu block rounded rounded-t-none top-full z-50 ml-4 py-0.5 text-left bg-white" style="min-width: 12rem">
                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown sub item</a></li>
                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown sub item</a></li>
                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown sub item</a></li>
                    <li><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown sub item</a></li>
                  </ul>
                </li><!--end submenu-->
                <li class="relative"><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown item</a></li>
                <li class="relative"><a class="block w-full py-2 px-5 border-b border-gray-100 hover:bg-gray-50" href="#">Dropdown item</a></li>
              </ul>
            </li>

            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Sport</a>
            </li>

            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Travel</a>
            </li>

            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Techno</a>
            </li>

            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Worklife</a>
            </li>

            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">Future</a>
            </li>

            <li class="relative">
              <a href="#" class="block py-2 px-5 border-b border-gray-100 hover:bg-gray-50">More</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- copyright -->
      <div class="py-4 px-6 text-sm mt-6 text-center">
        <p>Copyright <a href="#">Tailnews</a> - All right reserved</p>
      </div>
    </nav>
  </div><!-- End Mobile menu -->

  <!-- =========={ MAIN }==========  -->
  <main id="content">
    <!-- advertisement -->
    <div class="bg-gray-50 py-4 hidden">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="mx-auto table text-center text-sm">
          <a class="uppercase" href="#">Advertisement</a>
          <a href="#">
            <img src="assets/landing_page/src/img/ads/ads_728.jpg" alt="advertisement area">
          </a>
        </div>
      </div>
    </div>

    <!-- ===== SLIDER FOTO ===== -->
    <div id="beranda" class="bg-white py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="w-full py-3">
          <h2 class="text-gray-800 text-2xl font-bold">
            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Informasi
          </h2>
        </div>
        <div id="hero-slider" class="hero-slider splide">
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide">
                <div class="hero-slide-item">
                  <img src="assets/landing_page/src/img/dummy/img1.jpg" alt="Slide 1">
                  <div class="hero-slide-caption">
                    <span class="hero-slide-tag"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Pengajuan</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white capitalize mb-2">Layanan Pengajuan Mudah & Cepat</h2>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div class="hero-slide-item">
                  <img src="assets/landing_page/src/img/dummy/img2.jpg" alt="Slide 2">
                  <div class="hero-slide-caption">
                    <span class="hero-slide-tag"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Pengaduan</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white capitalize mb-2">Sampaikan Pengaduan Anda</h2>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div class="hero-slide-item">
                  <img src="assets/landing_page/src/img/dummy/img3.jpg" alt="Slide 3">
                  <div class="hero-slide-caption">
                    <span class="hero-slide-tag"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Informasi</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white capitalize mb-2">Informasi Terkini Untuk Anda</h2>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div class="hero-slide-item">
                  <img src="assets/landing_page/src/img/dummy/img4.jpg" alt="Slide 4">
                  <div class="hero-slide-caption">
                    <span class="hero-slide-tag"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Panduan</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white capitalize mb-2">Panduan Penggunaan Layanan</h2>
                  </div>
                </div>
              </li>
              <li class="splide__slide">
                <div class="hero-slide-item">
                  <img src="assets/landing_page/src/img/dummy/img5.jpg" alt="Slide 5">
                  <div class="hero-slide-caption">
                    <span class="hero-slide-tag"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Kontak</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white capitalize mb-2">Hubungi Kami Kapan Saja</h2>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="slider-progress-bar">
            <div class="slider-progress-fill"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== STATISTIK ===== -->
    <div class="bg-white">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap text-center">

          <div class="flex-shrink max-w-full w-full sm:w-1/3">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
              </div>
              <span class="stat-number" data-target="100">0</span>
              <span class="stat-label">Pengaduan Selesai</span>
            </div>
          </div>

          <div class="flex-shrink max-w-full w-full sm:w-1/3 stat-item--border">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
              <span class="stat-number" data-target="50">0</span>
              <span class="stat-label">Pengajuan Selesai</span>
            </div>
          </div>

          <div class="flex-shrink max-w-full w-full sm:w-1/3">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <span class="stat-number" data-target="200">0</span>
              <span class="stat-label">Pengguna Aktif</span>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- ===== CARD LAYANAN ===== -->
    <div class="bg-white py-8">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="w-full py-3 mb-2">
          <h2 class="text-gray-800 text-2xl font-bold">
            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Layanan Tersedia
          </h2>
        </div>
        <div class="flex flex-row flex-wrap -mx-3">

          <!-- Card Pengajuan -->
          <div class="flex-shrink max-w-full w-full sm:w-1/2 px-3 mb-6">
            <div class="service-card bg-white border border-gray-100">
              <div class="service-card-img">
                <img src="assets/landing_page/src/img/dummy/img6.jpg" alt="Pengajuan">
                <span class="service-card-label">Pengajuan</span>
              </div>
              <div class="service-card-body">
                <div class="flex items-center mb-3">
                  <div class="inline-block h-5 border-l-3 border-red-600 mr-3"></div>
                  <h3 class="text-lg font-bold leading-tight text-gray-800">Sistem Pengajuan</h3>
                </div>
                <p class="text-gray-600 leading-tight mb-4">
                  Ajukan permohonan layanan Anda secara online. Proses cepat, transparan, dan dapat dipantau secara real-time.
                </p>
                <ul class="service-list">
                  <li>Pengajuan izin &amp; dokumen</li>
                  <li>Permohonan surat keterangan</li>
                  <li>Tracking status pengajuan</li>
                </ul>
                <div class="service-card-footer">
                  <a href="{{ $submissionsRoute }}" class="service-btn">
                    Ajukan Sekarang &rarr;
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Pengaduan -->
          <div class="flex-shrink max-w-full w-full sm:w-1/2 px-3 mb-6">
            <div class="service-card bg-white border border-gray-100">
              <div class="service-card-img">
                <img src="assets/landing_page/src/img/dummy/img7.jpg" alt="Pengaduan">
                <span class="service-card-label">Pengaduan</span>
              </div>
              <div class="service-card-body">
                <div class="flex items-center mb-3">
                  <div class="inline-block h-5 border-l-3 border-red-600 mr-3"></div>
                  <h3 class="text-lg font-bold leading-tight text-gray-800">Sistem Pengaduan</h3>
                </div>
                <p class="text-gray-600 leading-tight mb-4">
                  Sampaikan keluhan atau masukan Anda dengan mudah. Setiap pengaduan akan ditangani secara serius dan terukur.
                </p>
                <ul class="service-list">
                  <li>Laporan keluhan masyarakat</li>
                  <li>Masukan &amp; saran layanan</li>
                  <li>Tracking status pengaduan</li>
                </ul>
                <div class="service-card-footer">
                  <a href="{{ $complaintsRoute }}" class="service-btn">Laporkan Sekarang &rarr;</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- block news -->
    <div id="informasi" class="bg-white">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap">
          <!-- Left -->
          <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
            <div class="w-full py-3">
              <h2 class="text-gray-800 text-2xl font-bold">
                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Informasi Terbaru
              </h2>
            </div>
            <div class="flex flex-row flex-wrap -mx-3">
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img6.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img7.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img8.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img9.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img10.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img11.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- right -->
          <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
            <div class="w-full bg-gray-50 h-full">
              <div class="text-sm py-6 sticky">
                <div class="w-full text-center">
                  <a class="uppercase" href="#">Advertisement</a>
                  <a href="#">
                    <img class="mx-auto" src="assets/landing_page/src/img/ads/250.jpg" alt="advertisement area">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- slider news -->
    <div id="galeri" class="relative bg-gray-50" style="background-image: url('src/img/bg.jpg');background-size: cover;background-position: center center;background-attachment: fixed">
      <div class="bg-black bg-opacity-70">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
          <div class="flex flex-row flex-wrap">
            <div class="flex-shrink max-w-full w-full py-12 overflow-hidden">
              <div class="w-full py-3">
                <h2 class="text-white text-2xl font-bold text-shadow-black">
                  <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Galeri
                </h2>
              </div>
              <div id="post-carousel" class="splide post-carousel">
                <div class="splide__track">
                  <ul class="splide__list">
                    <li class="splide__slide">
                      <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                          <a href="">
                            <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img14.jpg" alt="alt title">
                          </a>
                          <div class="py-3 px-6">
                            <h3 class="text-lg font-bold leading-tight mb-2">
                              <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                            </h3>
                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide">
                      <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                          <a href="">
                            <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img15.jpg" alt="alt title">
                          </a>
                          <div class="py-3 px-6">
                            <h3 class="text-lg font-bold leading-tight mb-2">
                              <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                            </h3>
                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide">
                      <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                          <a href="">
                            <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img16.jpg" alt="alt title">
                          </a>
                          <div class="py-3 px-6">
                            <h3 class="text-lg font-bold leading-tight mb-2">
                              <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                            </h3>
                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide">
                      <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                          <a href="">
                            <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img17.jpg" alt="alt title">
                          </a>
                          <div class="py-3 px-6">
                            <h3 class="text-lg font-bold leading-tight mb-2">
                              <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                            </h3>
                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide">
                      <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                          <a href="">
                            <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img18.jpg" alt="alt title">
                          </a>
                          <div class="py-3 px-6">
                            <h3 class="text-lg font-bold leading-tight mb-2">
                              <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                            </h3>
                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="splide__slide">
                      <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                          <a href="">
                            <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img1.jpg" alt="alt title">
                          </a>
                          <div class="py-3 px-6">
                            <h3 class="text-lg font-bold leading-tight mb-2">
                              <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                            </h3>
                            <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- block news -->
    <div id="berita" class="bg-gray-50 py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="flex flex-row flex-wrap">
          <!-- post -->
          <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
            <div class="w-full py-3">
              <h2 class="text-gray-800 text-2xl font-bold">
                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Latest news
              </h2>
            </div>
            <div class="flex flex-row flex-wrap -mx-3">
              <div class="flex-shrink max-w-full w-full px-3 pb-5">
                <div class="relative hover-img max-h-98 overflow-hidden">
                  <!--thumbnail-->
                  <a href="#">
                    <img class="max-w-full w-full mx-auto h-auto" src="assets/landing_page/src/img/dummy/img15.jpg" alt="Image description">
                  </a>
                  <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                    <!--title-->
                    <a href="#">
                      <h2 class="text-3xl font-bold capitalize text-white mb-3">Amazon Shoppers Are Ditching Designer Belts for This Best-Selling</h2>
                    </a>
                    <p class="text-gray-100 hidden sm:inline-block">This is a wider card with supporting text below as a natural lead-in to additional content. This very helpfull for generate default content..</p>
                    <!-- author and date -->
                    <div class="pt-2">
                      <div class="text-gray-100">
                        <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Europe
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img24.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img7.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img17.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img25.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img12.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
              <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                <div class="flex flex-row sm:block hover-img">
                  <a href="">
                    <img class="max-w-full w-full mx-auto" src="assets/landing_page/src/img/dummy/img8.jpg" alt="alt title">
                  </a>
                  <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                    <h3 class="text-lg font-bold leading-tight mb-2">
                      <a href="#">5 Tips to Save Money Booking Your Next Hotel Room</a>
                    </h3>
                    <p class="hidden md:block text-gray-600 leading-tight mb-1">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a class="text-gray-500" href="#"><span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>Europe</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- sidebar -->
          <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pr-8 lg:pt-14 lg:pb-8 order-first">
            <div class="w-full bg-white">
              <div class="mb-6">
                <div class="p-4 bg-gray-100">
                  <h2 class="text-lg font-bold">Most Popular</h2>
                </div>
                <ul class="post-number">
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Why the world would end without political polls</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Meet The Man Who Designed The Ducati Monster</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">2020 Audi R8 Spyder spy shots release</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">Lamborghini makes Huracán GT3 racer faster for 2019</a>
                  </li>
                  <li class="border-b border-gray-100 hover:bg-gray-50">
                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="#">ZF plans $14 billion autonomous vehicle push, concept van</a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="text-sm py-6 sticky">
              <div class="w-full text-center">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="#">
                  <img class="mx-auto" src="assets/landing_page/src/img/ads/250.jpg" alt="advertisement area">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== FAQ ===== -->
    <div id="faq" class="bg-gray-50 py-6">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <div class="w-full mb-8" style="max-width: 1000px; margin: 0 auto 2rem auto;">
          <h2 class="text-gray-800 text-2xl font-bold">
            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Pertanyaan Umum
          </h2>
        </div>

        <div class="faq-list">

          <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
              <span>Bagaimana cara mengajukan permohonan layanan?</span>
              <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer">
              <p>Anda dapat mengajukan permohonan melalui menu Layanan &rarr; Pengajuan. Isi formulir yang tersedia, lampirkan dokumen yang diperlukan, lalu klik tombol Ajukan. Status pengajuan dapat dipantau secara real-time di halaman dashboard Anda.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
              <span>Berapa lama waktu proses pengajuan?</span>
              <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer">
              <p>Waktu proses pengajuan umumnya berlangsung antara 3 hingga 7 hari kerja tergantung jenis layanan yang diajukan. Anda akan mendapatkan notifikasi melalui email atau nomor telepon yang terdaftar ketika status pengajuan berubah.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
              <span>Bagaimana cara menyampaikan pengaduan?</span>
              <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer">
              <p>Pengaduan dapat disampaikan melalui menu Layanan &rarr; Pengaduan. Ceritakan keluhan Anda secara lengkap dan jelas, sertakan bukti pendukung jika ada. Tim kami akan menindaklanjuti setiap pengaduan dalam waktu maksimal 2x24 jam hari kerja.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
              <span>Apakah saya perlu membuat akun untuk menggunakan layanan?</span>
              <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer">
              <p>Ya, Anda perlu mendaftarkan akun terlebih dahulu untuk dapat menggunakan layanan pengajuan dan pengaduan. Pendaftaran gratis dan hanya membutuhkan NIK, nama lengkap, email, serta nomor telepon yang aktif.</p>
            </div>
          </div>

          <div class="faq-item">
            <button class="faq-question" onclick="toggleFaq(this)">
              <span>Bagaimana cara memantau status pengajuan saya?</span>
              <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div class="faq-answer">
              <p>Setelah login, masuk ke halaman Dashboard lalu pilih menu Riwayat Pengajuan. Di sana Anda dapat melihat status terkini dari semua pengajuan yang pernah dibuat beserta riwayat perubahannya secara lengkap.</p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </main><!-- end main -->

  <!-- =========={ FOOTER }==========  -->
  <footer style="background-color: #07213e;" class="text-gray-400">
    <!--Footer content-->
    <div id="footer-content" class="relative pt-8 xl:pt-16 pb-6 xl:pb-12">
      <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2 overflow-hidden">
        <div class="flex flex-wrap flex-row lg:justify-between -mx-3">
          <div class="flex-shrink max-w-full w-full lg:w-2/5 px-3 lg:pr-16">
            <div class="flex items-center mb-2">
              <span class="text-3xl leading-normal mb-2 font-bold text-gray-100 mt-2">TailNews</span>
              <!-- <img src="assets/landing_page/src/img-min/logo.png" alt="LOGO"> -->
            </div>
            <p>Tailwind News Template for build great newspapper, magazine and news portal.</p>
            <ul class="space-x-3 mt-6 mb-6 Lg:mb-0">
              <!--facebook-->
              <li class="inline-block">
                <a class="hover:text-gray-100" rel="noopener noreferrer" href="#!" title="Facebook">
                  <!-- <i class="fab fa-facebook fa-2x"></i> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                  </svg>
                </a>
              </li>
              <!--twitter-->
              <li class="inline-block">
                <a class="hover:text-gray-100" rel="noopener noreferrer" href="#!" title="Twitter">
                  <!-- <i class="fab fa-twitter fa-2x"></i> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                  </svg>
                </a>
              </li>
              <!--youtube-->
              <li class="inline-block">
                <a class="hover:text-gray-100" rel="noopener noreferrer" href="#!" title="Youtube">
                  <!-- <i class="fab fa-youtube fa-2x"></i> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M508.64,148.79c0-45-33.1-81.2-74-81.2C379.24,65,322.74,64,265,64H247c-57.6,0-114.2,1-169.6,3.6-40.8,0-73.9,36.4-73.9,81.4C1,184.59-.06,220.19,0,255.79q-.15,53.4,3.4,106.9c0,45,33.1,81.5,73.9,81.5,58.2,2.7,117.9,3.9,178.6,3.8q91.2.3,178.6-3.8c40.9,0,74-36.5,74-81.5,2.4-35.7,3.5-71.3,3.4-107Q512.24,202.29,508.64,148.79ZM207,353.89V157.39l145,98.2Z"></path>
                  </svg>
                </a>
              </li>
              <!--instagram-->
              <li class="inline-block">
                <a class="hover:text-gray-100" rel="noopener noreferrer" href="#!" title="Instagram">
                  <!-- <i class="fab fa-instagram fa-2x"></i> -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                    <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                    <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                  </svg>
                </a>
              </li><!--end instagram-->
            </ul>
          </div>
          <div class="flex-shrink max-w-full w-full lg:w-3/5 px-3">
            <div class="flex flex-wrap flex-row">
              <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Product</h4>
                <ul>
                  <li class="py-1 hover:text-white"><a href="#">Landing</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Pages</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Sections</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Sign Up</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Login</a></li>
                </ul>
              </div>
              <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Support</h4>
                <ul>
                  <li class="py-1 hover:text-white"><a href="#">Documentation</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Changelog</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Tools</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Icons</a></li>
                </ul>
              </div>
              <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Includes</h4>
                <ul>
                  <li class="py-1 hover:text-white"><a href="#">Utilities</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Components</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Example code</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Updates</a></li>
                </ul>
              </div>
              <div class="flex-shrink max-w-full w-1/2 md:w-1/4 mb-6 lg:mb-0">
                <h4 class="text-base leading-normal mb-3 uppercase text-gray-100">Legal</h4>
                <ul>
                  <li class="py-1 hover:text-white hover:text-white"><a href="#">Privacy Policy</a></li>
                  <li class="py-1 hover:text-white"><a href="#">Terms of Use</a></li>
                  <li class="py-1 hover:text-white"><a href="#">License</a></li>
                  <li class="py-1 hover:text-white"><a href="#">GDPR</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Start footer copyright-->
    <div class="footer-dark">
      <div class="py-4 border-t border-gray-200 border-opacity-10">
        <div class="row">
          <div class="col-12 col-md text-center">
            <p class="d-block my-3 text-center">All rights reserved by <a href="https://aribudin.gumroad.com/" target="_blank" class="font-bold text-white">Ari Budin</a> • Distributed by <a href="https://themewagon.com/" target="_blank" class="font-bold text-white">ThemeWagon</a></p>
          </div>
        </div>
      </div>
    </div><!--End footer copyright-->
  </footer><!-- end footer -->

  <!-- =========={ SCROLL TO TOP }==========  -->
  <a href="#" class="back-top fixed p-4 rounded bg-gray-100 border border-gray-100 text-gray-500 right-4 bottom-4 hidden" aria-label="Scroll To Top">
    <svg width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
      <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z" clip-rule="evenodd"></path>
    </svg>
  </a>

  <!--Vendor js-->
  <script src="assets/landing_page/src/vendors/hc-sticky/dist/hc-sticky.js"></script>
  <script src="assets/landing_page/src/vendors/glightbox/dist/js/glightbox.min.js"></script>
  <script src="assets/landing_page/src/vendors/@splidejs/splide/dist/js/splide.min.js"></script>
  <script src="assets/landing_page/src/vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js"></script>

  <!-- Start development js -->
  <script src="assets/landing_page/src/js/theme.js"></script>
  <!-- End development js -->

  <!-- Production js -->
  <!-- <script src="dist/js/scripts.js"></script> -->
</body>

</html>