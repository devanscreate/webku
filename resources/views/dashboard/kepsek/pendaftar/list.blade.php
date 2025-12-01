@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Data Pendaftar (View Kepsek)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pendaftar</li>
        </ol>
    </nav>
</div>@if (session('message'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('message') }}
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Laporan Pendaftar SMAN XYZ</h5>

                    {{-- Data Table --}}
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>File Raport</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Rata-rata</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftar as $item)
                            <tr>
                                @php
                                $average = $item->nilai_raport_s1 + $item->nilai_raport_s2 + $item->nilai_raport_s3 + $item->nilai_raport_s4 + $item->nilai_raport_s5;
                                @endphp

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->asal_sekolah }}</td>
                                <td>
                                    <a href="{{ Storage::url($item->file_raport) }}" target="_blank" class="badge bg-secondary">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Lihat
                                    </a>
                                </td>
                                <td>{{ $item->alamat_lengkap }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}</td>
                                <td>{{ number_format($average / 5, 1) }}</td>

                                <td>
                                    @if ($item->status == 'diproses')
                                    <span class="badge bg-warning">Diproses</span>
                                    @elseif ($item->status == 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                    @else
                                    <span class="badge bg-success">Diterima</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{-- Tombol Detail (Pastikan route kepsek.pendaftar.show ada di web.php) --}}
                                    {{-- Jika belum ada route show khusus kepsek, bisa dihapus atau dibuatkan --}}
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('kepsek.pendaftar.show', $item->id) }}">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>

                                    {{-- Tombol Cetak PDF (Menggunakan route khusus Kepsek) --}}
                                    <a class="btn btn-danger btn-sm mt-1"
                                        href="{{ route('kepsek.pendaftar.cetak-pdf', $item->id) }}"
                                        target="_blank">
                                        <i class="bi bi-printer"></i> PDF
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- End Data Table --}}

                </div>
            </div>
        </div>
    </div>
</section>
@endsection