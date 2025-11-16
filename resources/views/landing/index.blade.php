<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PPDB - SMK XYZ</title>
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
                <h1>SMK XYZ<span>.</span></h1>
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
                    <h2>Welcome to <span>PPDB SMK XYZ</span></h2>
                    <p>Penerimaan Peserta Didik Baru Tahun 2024/2025</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#daftar" class="btn-get-started">Daftar</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('NiceAdmin/assets/img/hider.jpg') }}" class="img-fluid" alt=""
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
                        <section id="daftar" class="daftar">
                            <div class="container" data-aos="fade-up">
                                <section class="section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center>
                                                        <h5 class="card-title text-success"> Data Diri
                                                            Telah Diterima</h5>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                        @endif
                    </div>
                    {{-- Form Data Wali --}}
                    <div class="tab-pane fade profile-edit" id="nilai-raport">
                        @if ($wali->count() == 0)
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Formulir Data OrangTua/Wali</h5>
                                            <!-- Form Pendaftaran -->
                                            <form action="{{ route('wali.store') }}" method="POST">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="nama_wali"
                                                        class="col-sm-4 col-form-label">Nama
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="nama_wali" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="pekerjaan_wali"
                                                        class="col-sm-4 col-form-label">Pekerjaan
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="pekerjaan_wali" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="alamat_wali"
                                                        class="col-sm-4 col-form-label">Alamat
                                                        Lengkap OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" style="height: 100px" name="alamat_wali" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="penghasilan_wali"
                                                        class="col-sm-4 col-form-label">Penghasilan
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="penghasilan_wali" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nohp_wali"
                                                        class="col-sm-4 col-form-label">Nomor Hp
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="nohp_wali" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="status_wali"
                                                        class="col-sm-4 col-form-label">Status
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <select name="status_wali" class="form-control" required>
                                                            <option value="Hidup">Masih Hidup
                                                            </option>
                                                            <option value="Meninggal">Meninggal
                                                            </option>
                                                        </select>
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
                                            <h5 class="card-title">Formulir Data OrangTua/Wali</h5>
                                            <!-- Form Pendaftaran -->
                                            <form action="{{ route('wali.update', Auth::user()->waliStudent->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row mb-3">
                                                    <label for="nama_wali"
                                                        class="col-sm-4 col-form-label">Nama
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="nama_wali" value="{{ Auth::user()->waliStudent->nama_wali }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="pekerjaan_wali"
                                                        class="col-sm-4 col-form-label">Pekerjaan
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="pekerjaan_wali" value="{{ Auth::user()->waliStudent->pekerjaan_wali }}" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="alamat_wali"
                                                        class="col-sm-4 col-form-label">Alamat
                                                        Lengkap OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" style="height: 100px" name="alamat_wali" required>{{ Auth::user()->waliStudent->alamat_wali }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="penghasilan_wali"
                                                        class="col-sm-4 col-form-label">Penghasilan
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" class="form-control"
                                                            name="penghasilan_wali" required value="{{ Auth::user()->waliStudent->penghasilan_wali }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nohp_wali"
                                                        class="col-sm-4 col-form-label">Nomor Hp
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="nohp_wali" required value="{{ Auth::user()->waliStudent->nohp_wali }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="status_wali"
                                                        class="col-sm-4 col-form-label">Status
                                                        OrangTua/Wali</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"
                                                            name="status_wali" required value="{{ Auth::user()->waliStudent->status_wali }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3 p-2">
                                                    <button type="submit"
                                                        class="btn btn-primary">Update
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
                        <section id="daftar" class="daftar">
                            <div class="container" data-aos="fade-up">
                                <section class="section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center>
                                                        <h5 class="card-title text-success"> Data Wali
                                                            Telah Diterima</h5>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                        @endif
                    </div>
                    {{-- Form Pas Foto dan Ijazah/SKL --}}
                    <div class="tab-pane fade profile-edit" id="raport">
                        @if ($ijazah->count() == 0)
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Formulir Pas Foto, Ijazah/SKL</h5>
                                            <!-- Form Pendaftaran -->
                                            <form action="{{ route('ijazah.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="pas_foto"
                                                        class="col-sm-4 col-form-label">File
                                                        Pas Foto</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="file"
                                                            id="formFile" name="pas_foto" required>
                                                        <div class="form-text">Upload Pas Foto Kamu
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="file_ijazah"
                                                        class="col-sm-4 col-form-label">File
                                                        Ijzah/SKL</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" type="file"
                                                            id="formFile" name="file_ijazah"
                                                            required>
                                                        <div class="form-text">Upload File Ijzah/SKL
                                                            Kamu</div>
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
                        <section id="daftar" class="daftar">
                            <div class="container" data-aos="fade-up">
                                <section class="section">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center>
                                                        <h5 class="card-title text-danger"> Data Ijazah
                                                            Telah Diterima</h5>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                        @endif
                    </div>
                </div>

            </div>
        </section>
        @endif
        @endif
        @endif

        <!-- ======= Clients Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="zoom-out">
                <div class="section-header">
                    <h2>Tentang Kami</h2>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <h3>SMK XYZ</h3>
                       <img src="{{ asset('NiceAdmin/assets/img/tentang kami.jpg') }}" class="img-fluid rounded-4 mb-4">

                            alt="">
                        <p>SMK XYZ adalah sebuah lembaga sekolah SMK swata yang berlokasi di XYZ, Kab. XYZ..</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="content ps-0 ps-lg-5">
                            <p>SMK XYZ ini berdiri sejak 2013. Saat ini SMK XYZ masih menggunakan program kurikulum belajar SMA 2013 MIPA. SMK XYZ dipimpin oleh seorang kepala sekolah yang bernama Gustirizal dan operator sekolah Trio Putra.</p>
                            <h4>
                                <b>
                                    Akreditasi SMK XYZ
                                </b>
                            </h4>
                            <p>
                                SMK XYZ memiliki akreditasi grade A dengan nilai (akreditasi tahun 2020) dari BAN-S/M (Badan Akreditasi Nasional) Sekolah/Madrasah.
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{ asset('NiceAdmin/assets/img/akreditas.jpg') }}" class="img-fluid rounded-4"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="content px-xl-5">
                            <h3><strong>Pertanyaan</strong> yang Sering Diajukan ?</h3>
                            <p>
                                PPDB Online SMK XYZ
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        <span class="num">1.</span>
                                        Jika mengalami kendala, kemana harus disampaikan?
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Pengaduan dapat disampaikan melalui kontak yang tersedia pada jam kerja, dapat
                                        juga datang langsung ke lokasi Sekolah tergantung jenis permasalahan yang
                                        dialami.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-2">
                                        <span class="num">2.</span>
                                        Apa saja dokumen yang harus disiapkan?
                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        1. Ijazah/Surat Keterangan Lulus <br>
                                        2. Akta Kelahiran/Surat Keterangan Lahir <br>
                                        3. Kartu Keluarga (minimal satu tahun) <br>
                                        4. Buku Rapor (semester 1 s.d. 5) <br>
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-3">
                                        <span class="num">3.</span>
                                        Apa Perbedaan PPDB Tahun ini dan Tahun Sebelumnya?
                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Secara umum, dari regulasi tidak banyak perubahan.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                        <span>PPDB </span>

                    </a>
                    <h5>Daftarkan diri mu sekarang!</h5>
                </div>
                <div class="col-lg-4 col-6 footer-links">
                    <h4>Lokasi</h4>
                    <p>
                       XYZ
                    </p>
                </div>
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p>
                        <strong>Phone:</strong> 0812XXXXXXXX<br>
                        <strong>Email:</strong> devanregiana12345@gmail.com<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>PPDB SMK XYZ</span></strong>. All Rights Reserved
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Impact') }}/Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Impact') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('Impact') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('Impact') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('Impact') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('Impact') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('Impact') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('Impact') }}/assets/js/main.js"></script>

</body>

</html>