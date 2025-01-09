@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Data Siswa</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pendaftar') }}">Pendaftar</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Siswa</h5>
                    <form action="{{ route('pendaftar.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label">Nama
                                Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" value="{{ $pendaftar->nama }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nisn" class="col-sm-4 col-form-label">NISN</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nisn" value="{{ $pendaftar->nisn }}"  required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal
                                Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir }}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat_lengkap" class="col-sm-4 col-form-label">Alamat
                                Lengkap</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="height: 100px" name="alamat_lengkap" required>{{ $pendaftar->alamat_lengkap }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_orangtua" class="col-sm-4 col-form-label">Nama
                                Orangtua</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_orangtua" value="{{ $pendaftar->nama_orangtua }}"
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal
                                Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="asal_sekolah" value="{{ $pendaftar->asal_sekolah }}" 
                                    required>
                            </div>
                        </div>

                        <div class="row mb-3 p-2">
                            <button class="btn btn-primary" type="submit">Ubah Data Siswa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection