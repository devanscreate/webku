<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Pendaftar</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 6px;
        }
    </style>
</head>

<body>

    <h2>Data Pendaftar SMAN XYZ</h2>

    <table>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $pendaftar->nama }}</td>
        </tr>
        <tr>
            <th>NISN</th>
            <td>{{ $pendaftar->nisn }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ date('d/m/Y', strtotime($pendaftar->tanggal_lahir)) }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pendaftar->alamat_lengkap }}</td>
        </tr>
        <tr>
            <th>Asal Sekolah</th>
            <td>{{ $pendaftar->asal_sekolah }}</td>
        </tr>
    </table>

    <h3>Nilai Raport</h3>
    <table>
        <tr>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>Semester 1</td>
            <td>{{ $pendaftar->nilai_raport_s1 }}</td>
        </tr>
        <tr>
            <td>Semester 2</td>
            <td>{{ $pendaftar->nilai_raport_s2 }}</td>
        </tr>
        <tr>
            <td>Semester 3</td>
            <td>{{ $pendaftar->nilai_raport_s3 }}</td>
        </tr>
        <tr>
            <td>Semester 4</td>
            <td>{{ $pendaftar->nilai_raport_s4 }}</td>
        </tr>
        <tr>
            <td>Semester 5</td>
            <td>{{ $pendaftar->nilai_raport_s5 }}</td>
        </tr>
    </table>

    <h3>Data Wali</h3>
    <table>
        <tr>
            <th>Nama Wali</th>
            <td>{{ $wali->nama_wali }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $wali->nohp_wali }}</td>
        </tr>
        <tr>
            <th>Alamat Wali</th>
            <td>{{ $wali->alamat_wali }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $wali->pekerjaan_wali }}</td>
        </tr>
        <tr>
            <th>Status Wali</th>
            <td>{{ $wali->status_wali }}</td>
        </tr>
    </table>

    <h3>Dokumen Siswa</h3>

    <p>Pas Foto:</p>
    @if ($fotoPath)
    <img src="{{ $fotoPath }}" width="160">
    @endif

    <p>File Ijazah:</p>
    @if ($ijazahPath)
    <img src="{{ $ijazahPath }}" width="240">
    @endif

    <p>Raport (PDF tidak bisa ditampilkan di PDF):</p>
    <small>File tetap terlampir dan bisa diunduh di sistem.</small>

</body>

</html>