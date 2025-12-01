@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Detail Pendaftar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kepsek.pendaftar') }}">Pendaftar</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Detail Siswa</h5>

                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $pendaftar->nama }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Asal Sekolah</label>
                            <input type="text" class="form-control" value="{{ $pendaftar->asal_sekolah }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="{{ date('d F Y', strtotime($pendaftar->tanggal_lahir)) }}" disabled>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Alamat Lengkap</label>
                            <textarea class="form-control" style="height: 100px" disabled>{{ $pendaftar->alamat_lengkap }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status Pendaftaran</label>
                            <div>
                                @if ($pendaftar->status == 'diproses')
                                <span class="badge bg-warning text-dark px-3 py-2">Sedang Diproses</span>
                                @elseif ($pendaftar->status == 'ditolak')
                                <span class="badge bg-danger px-3 py-2">Ditolak</span>
                                @else
                                <span class="badge bg-success px-3 py-2">Diterima</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">File Raport</label>
                            <div>
                                <a href="{{ Storage::url($pendaftar->file_raport) }}" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="bi bi-file-earmark-pdf"></i> Lihat File Raport
                                </a>
                            </div>
                        </div>

                        {{-- Nilai Raport --}}
                        <h5 class="card-title mt-4">Nilai Raport</h5>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label class="form-label small">Semester 1</label>
                                <input type="text" class="form-control text-center" value="{{ $pendaftar->nilai_raport_s1 }}" disabled>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label small">Semester 2</label>
                                <input type="text" class="form-control text-center" value="{{ $pendaftar->nilai_raport_s2 }}" disabled>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label small">Semester 3</label>
                                <input type="text" class="form-control text-center" value="{{ $pendaftar->nilai_raport_s3 }}" disabled>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label small">Semester 4</label>
                                <input type="text" class="form-control text-center" value="{{ $pendaftar->nilai_raport_s4 }}" disabled>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label small">Semester 5</label>
                                <input type="text" class="form-control text-center" value="{{ $pendaftar->nilai_raport_s5 }}" disabled>
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <a href="{{ route('kepsek.pendaftar') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection