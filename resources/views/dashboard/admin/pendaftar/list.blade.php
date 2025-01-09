@extends('layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Data Pendaftar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pendaftar</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


@if (session('message'))
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
                    <h5 class="card-title">Data Pendaftar SMAN XYZ</h5>
                    {{-- Data Table --}}
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>File Raport</th>
                                <th>Alamat</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Tanggal Lahir</th>
                                <th>Rata-rata</th>
                                <th>Status</th>
                                <th>Menu</th>
                                <th>Menu</th>
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
                                <td><a href="{{ Storage::url($item->file_raport) }}" target="_blank">File</a></td>
                                <td>{{ $item->alamat_lengkap }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->tanggal_lahir)) }}</td>
                                <td>{{ $average / 5 }}</td>
                                @if ($item->status == 'diproses')
                                <td><span class="badge bg-warning">Diproses</span></td>
                                @elseif ($item->status == 'ditolak')
                                <td><span class="badge bg-danger">Ditolak</span></td>
                                @else
                                <td><span class="badge bg-success">Diterima</span></td>
                                @endif
                                <td>
                                    <form method="POST"
                                        action="{{ url('/dashboard/admin/pendaftar/' . $item->id . '/update-status-diterima') }}">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit">Terima</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ url('/dashboard/admin/pendaftar/' . $item->id . '/update-status-ditolak') }}">
                                        @csrf
                                        <button class="btn btn-warning btn-sm mt-2" type="submit">Tolak</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('pendaftar.edit', $item->id) }}">Edit</a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('pendaftar.show', $item->id) }}">Detail</a>
                                    <form action="{{ route('pendaftar.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm mt-2" type="submit">Delete</button>
                                    </form>
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