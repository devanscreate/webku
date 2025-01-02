<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PPDB - SMK Muhammadiyah 1 Purbalingga</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('Impact') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Impact') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('Impact') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('Impact') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('Impact') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('Impact') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Impact') }}/assets/css/main.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <h1>SMK Muhammadiyah 1 Purbalingga<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>
                    </li>

                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 mb-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Welcome to <span>PPDB SMK Muhammadiyah 1 Purbalingga</span></h2>
                    <p>Penerimaan Peserta Didik Baru Tahun 2024/2025</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#daftar" class="btn-get-started">Daftar</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('Impact') }}/assets/img/profil1.jpg" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">
        <!-- ======= Daftar Section ======= -->
        @if (Auth::check() == false)
        <section id="daftar" class="daftar">
            <div class="container" data-aos="fade-up">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h5 class="card-title"> Pendaftaran Telah Dibuka!</h5>
                                        <h6>Kamu Ingin mendaftar? Buat Akun terlebih dahulu!
                                        </h6>
                                        <a class="btn btn-primary mt-3" href="{{ route('register') }}">Buat
                                            Akun</a>
                                    </center>
                                </div>
                            </div>

                        </div>
                </section>
            </div>
        </section>
        @else
        @if (Auth::check() && auth()->user()->role == 'User')
        @if (auth()->user()->registered == 0)
        <section id="daftar" class="daftar">
            <div class="container" data-aos="fade-up">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('message') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                <div class="section-header">
                    <h2>Daftar Segera</h2>
                    <p>Daftarkan diri kamu melalui form dibawah ini!</p>
                </div>

                <div class="pagetitle">
                    <h1>Form Pendaftaran</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#daftar">Daftar</a></li>
                            <li class="breadcrumb-item">Home</li>
                        </ol>
                    </nav>
                </div>
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#profile-overview">Biodata Diri</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nilai-raport">Data
                            Wali</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#raport">Pas Foto,
                            Ijazah/SKL</button>
                    </li>
                </ul>
                <div class="tab-content">
                    {{-- Form Data Akademik --}}
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        @if ($datadiri->count() == 0)
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Formulir Data Diri</h5>
                                            <!-- Form Pendaftaran -->
                                            <form action="{{ route('pendaftar.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="name"
                                                        class="col-sm-4 col-form-label">Nama
                                                        Lengkap</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="nama" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nisn"
                                                        class="col-sm-4 col-form-label">NISN</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="nisn" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="tanggal_lahir"
                                                        class="col-sm-4 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control"
                                                            name="tanggal_lahir" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="alamat_lengkap"
                                                        class="col-sm-4 col-form-label">Alamat
                                                        Lengkap</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" style="height: 100px" name="alamat_lengkap" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="asal_sekolah"
                                                        class="col-sm-4 col-form-label">Asal
                                                        Sekolah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="asal_sekolah" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Rapor
                                                        Semester 1</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s1" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Rapor
                                                        Semester 2</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s2" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Rapor
                                                        Semester 3</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s3" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Rapor
                                                        Semester 4</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s4" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Rapor
                                                        Semester 5</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s5" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="file_raport"
                                                        class="col-sm-4 col-form-label">File
                                                        Rapor</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="file"
                                                            id="formFile" name="file_raport"
                                                            required>
                                                        <div class="form-text">Upload PDF / Lampiran
                                                            Rapor Kamu</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3 p-2">
                                                    <button type="submit"
                                                        class="btn btn-primary">Submit
                                                        Pendaftaran</button>
                                                </div>

                                            </form><!-- End Form Pendaftaran -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-danger"> Pemberitahuan!</h5>
                                            <h6 class="text-danger">Mohon lengkapi dan cek data anda
                                                dengan seksama!</h6>
                                            <ol>
                                                <li>Kesalahan dalam penginputan data atau terdapat data
                                                    yang tidak sesuai dapat berupa penolakan !</li>
                                                <li>Pemalsuan data dapat berupa blacklist dalam
                                                    pendaftaran</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @else
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Formulir Data Diri</h5>
                                            <!-- Form Pendaftaran -->
                                            <form action="{{ route('siswa.update', $item->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <label for="name"
                                                        class="col-sm-4 col-form-label">Nama
                                                        Lengkap</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="{{ $item->nama }}" class="form-control"
                                                            name="nama" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nisn"
                                                        class="col-sm-4 col-form-label">NISN</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="{{ $item->nisn }}" class="form-control"
                                                            name="nisn" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="tanggal_lahir"
                                                        class="col-sm-4 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control"
                                                            name="tanggal_lahir" value="{{ $item->tanggal_lahir }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="alamat_lengkap"
                                                        class="col-sm-4 col-form-label">Alamat
                                                        Lengkap</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" style="height: 100px" name="alamat_lengkap" required>{{ $item->alamat_lengkap }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="asal_sekolah"
                                                        class="col-sm-4 col-form-label">Asal
                                                        Sekolah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="asal_sekolah" value="{{ $item->asal_sekolah }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Raport
                                                        Semester 1</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s1" value="{{ $item->nilai_raport_s1 }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Raport
                                                        Semester 2</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s2" value="{{ $item->nilai_raport_s2 }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Raport
                                                        Semester 3</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s3" value="{{ $item->nilai_raport_s3 }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Raport
                                                        Semester 4</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s4" value="{{ $item->nilai_raport_s4 }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nilai_raport"
                                                        class="col-sm-4 col-form-label">Nilai Raport
                                                        Semester 5</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="nilai_raport_s5" value="{{ $item->nilai_raport_s5 }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="file_raport"
                                                        class="col-sm-4 col-form-label">File
                                                        Raport</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="file"
                                                            id="formFile" name="file_raport">
                                                        <div class="form-text">Upload PDF / Lampiran
                                                            Raport Kamu</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3 p-2">
                                                    <button type="submit"
                                                        class="btn btn-primary">Update
                                                        Data</button>
                                                </div>

                                            </form><!-- End Form Pendaftaran -->
                                        </div>
                                    </div>
                                </div>