<?php

namespace App\Http\Controllers;

use App\Models\IjazahStudent;
use App\Models\ParticipantStudent;
use App\Models\Pendaftar;
use App\Models\WaliStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRelatedData = ParticipantStudent::where('user_id', Auth::id())->get();
        $wali = WaliStudent::where('user_id', Auth::id())->get();
        $ijazah = IjazahStudent::where('user_id', Auth::id())->get();
        return view('dashboard.user.status-pendaftaran', compact('userRelatedData', 'wali', 'ijazah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = ParticipantStudent::findOrFail($id);
        return view('dashboard.user.edit', [
            'siswa' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'nama_orangtua' => 'required',
            'asal_sekolah' => 'required',
            'nilai_raport_s1' => 'required',
            'nilai_raport_s2' => 'required',
            'nilai_raport_s3' => 'required',
            'nilai_raport_s4' => 'required',
            'nilai_raport_s5' => 'required',
            'file_raport' => 'mimes:pdf|file',
        ]);
        if($request->file('file_raport')){
            $file = $request->nama . '-' . time() . '.' .$request->file_raport->extension();
            $validatedData['file_raport'] = Storage::putFileAs('public/file-raport', $request->file_raport, $file);
        }

        $pendaftar = ParticipantStudent::findOrFail($id);
        $pendaftar->update($validatedData);
        if ($request->hasFile('file_raport')) {
            ParticipantStudent::where('id', $id)->update($validatedData);
        }

        return back()->with('message', 'Sukses! Data Kamu Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
