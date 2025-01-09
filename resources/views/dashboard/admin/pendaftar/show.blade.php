@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Data Raport Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pendaftar') }}">Pendaftar</a></li>
                <li class="breadcrumb-item active">Detail Siswa</li>
            </ol>
        </nav>
    </div>
    <ul class="nav nav-tabs nav-tabs-bordered">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab"
                data-bs-target="#biodata">Biodata Siswa</button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nilai-raport">Data Raport</button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#data-wali">Data Wali</button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#foto-ijazah">Pas Foto, Ijazah/SKL</button>
        </li>
    </ul>
    <div class="tab-content">
        {{-- Form Data Akademik --}}
        <div class="tab-pane fade show active profile-overview" id="biodata">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Diri - {{ $pendaftar->nama }}</h5>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label ">Nama Lengkap :</div>
                                    <div class="col-lg-8 col-md-8">{{ $pendaftar->nama }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">No NISN :</div>
                                    <div class="col-lg-8 col-md-8">{{ $pendaftar->nisn }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Tanggal Lahir :</div>
                                    <div class="col-lg-8 col-md-8">
                                        {{ date('d/m/Y', strtotime($pendaftar->tanggal_lahir)) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Alamat Lengkap :</div>
                                    <div class="col-lg-8 col-md-8">{{ $pendaftar->alamat_lengkap }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Asal Sekolah :</div>
                                    <div class="col-lg-8 col-md-8">{{ $pendaftar->asal_sekolah }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{-- Form Data Raport Siswa --}}
        <div class="tab-pane fade profile-edit" id="nilai-raport">
            <section class="section">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Raport - {{ $pendaftar->nama }}</h5>
                                <div class="row mb-3">
                                    <label for="nilai_raport" class="col-sm-4 col-form-label">Nilai Raport Semester 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_raport_s1"
                                            value="{{ $pendaftar->nilai_raport_s1 }}" disabled required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_raport" class="col-sm-4 col-form-label">Nilai Raport Semester 2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_raport_s2"
                                            value="{{ $pendaftar->nilai_raport_s2 }}" disabled required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_raport" class="col-sm-4 col-form-label">Nilai Raport Semester 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_raport_s3"
                                            value="{{ $pendaftar->nilai_raport_s3 }}" disabled required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_raport" class="col-sm-4 col-form-label">Nilai Raport Semester 4</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_raport_s4"
                                            value="{{ $pendaftar->nilai_raport_s4 }}" disabled required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nilai_raport" class="col-sm-4 col-form-label">Nilai Raport Semester 5</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_raport_s5"
                                            value="{{ $pendaftar->nilai_raport_s5 }}" disabled required>
                                    </div>
                                </div>
                                @php
                                    $average = $pendaftar->nilai_raport_s1 + $pendaftar->nilai_raport_s2 + $pendaftar->nilai_raport_s3 + $pendaftar->nilai_raport_s4 + $pendaftar->nilai_raport_s5;
                                @endphp
                                <div class="row mb-3">
                                    <label for="nilai_raport" class="col-sm-4 col-form-label">Rata-rata Nilai Raport</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nilai_raport_s5"
                                            value="{{ $average / 5 }}" disabled required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <iframe src="{{ Storage::url($pendaftar->file_raport) }}" frameborder="0" height="550px" width="100%">
                        </iframe>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade profile-edit" id="data-wali">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Wali- {{ $pendaftar->nama }}</h5>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label ">Nama Wali :</div>
                                    <div class="col-lg-8 col-md-8">{{ $wali->nama_wali }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">No Hp :</div>
                                    <div class="col-lg-8 col-md-8">{{ $wali->nohp_wali }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Alamat Wali :</div>
                                    <div class="col-lg-8 col-md-8">{{ $wali->alamat_wali }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Pekerjaan Wali :</div>
                                    <div class="col-lg-8 col-md-8">{{ $wali->pekerjaan_wali }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Penghasilan Wali :</div>
                                    <div class="col-lg-8 col-md-8">{{ $wali->penghasilan_wali }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Status Wali :</div>
                                    <div class="col-lg-8 col-md-8">{{ $wali->status_wali }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade profile-edit" id="foto-ijazah">
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Wali- {{ $pendaftar->nama }}</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <iframe src="{{ Storage::url($ijazah->pas_foto) }}" frameborder="0" height="550px" width="100%">
                                        </iframe>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <iframe src="{{ Storage::url($ijazah->file_ijazah) }}" frameborder="0" height="550px" width="100%">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
