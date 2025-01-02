<?php

namespace App\Http\Controllers;

use App\Models\IjazahStudent;
use App\Models\ParticipantStudent;
use App\Models\User;
use App\Models\WaliStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftar = ParticipantStudent::get();
        return view('dashboard.admin.pendaftar.list', [
            'pendaftar' => $pendaftar,
        ]);
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'asal_sekolah' => 'required',
            'nilai_raport_s1' => 'required',
            'nilai_raport_s2' => 'required',
            'nilai_raport_s3' => 'required',
            'nilai_raport_s4' => 'required',
            'nilai_raport_s5' => 'required',
            'file_raport' => 'mimes:pdf|file',
        ]);
        $validatedData['user_id'] = Auth::id();
        $file = $request->nama . '-' . time() . '.' .$request->file_raport->extension();
        $validatedData['file_raport'] = Storage::putFileAs('public/file-raport', $request->file_raport, $file);

        ParticipantStudent::create($validatedData);
        return redirect()->back()->with('message', 'Sukses! Data Biodata kamu telah diterima oleh admin, lanjut isi data wali!');
    }

    public function waliStore(Request $request){
        $validatedData = $request->validate([
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'nohp_wali' => 'required',
            'status_wali' => 'required',
            'penghasilan_wali' => 'required',
        ]);
        $validatedData['user_id'] = Auth::id();
        WaliStudent::create($validatedData);
        return redirect()->back()->with('message', 'Sukses! Data Wali kamu telah diterima oleh admin, lanjut isi data pas foto & ijazah!');
    }

    public function ijazahStore(Request $request){
        $validatedData = $request->validate([
            'pas_foto' => 'mimes:.jpeg,jpg,png,pdf|file',
            'file_ijazah' => 'mimes:pdf|file',
        ]);
        $validatedData['user_id'] = Auth::id();
        $file = $request->id . '-' . time() . '.' .$request->file_ijazah->extension();
        $validatedData['file_ijazah'] = Storage::putFileAs('public/file-ijazah', $request->file_ijazah, $file);
        $foto = $request->id . '-' . time() . '.' .$request->pas_foto->extension();
        $validatedData['pas_foto'] = Storage::putFileAs('public/file-foto', $request->pas_foto, $foto);

        $ijazah = IjazahStudent::create($validatedData);
        if(Auth::user()->waliStudent == null or Auth::user()->participantStudent == null ){
            return back()->with('message', 'Silahkan isi data wali terlebih dahulu!');    
        }

        $user = $ijazah->user;
        $user->update(['registered' => true]);
        return redirect()->back()->with('message', 'Sukses! Semua data pendaftaran mu telah diterima oleh admin, cek status pendaftaran!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pendaftar = ParticipantStudent::findOrFail($id);
        $wali = WaliStudent::findOrFail($id);
        $ijazah = IjazahStudent::findOrFail($id);
        return view('dashboard.admin.pendaftar.show', [
            'pendaftar' => $pendaftar,
            'wali' => $wali,
            'ijazah' => $ijazah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pendaftar = ParticipantStudent::findOrFail($id);
        return view('dashboard.admin.pendaftar.edit', [
            'pendaftar' => $pendaftar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'nama_orangtua' => 'required',
            'asal_sekolah' => 'required',
        ]);

        $pendaftar = ParticipantStudent::findOrFail($id);
        $pendaftar->update($validatedData);

        return redirect()
        ->route('pendaftar')
        ->with('message', 'Sukses! 1 Data Berhasil Diubah');
    }

    public function updateStatusDiterima(ParticipantStudent $id)
    {   
        // $pendaftar = Pendaftar::find($request->terima_id);
        $id->update(['status' => 'diterima']);
        return redirect()->back();
    }
    
    public function updateStatusDitolak(ParticipantStudent $id)
    {
        $id->update(['status' => 'ditolak']);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy (Request $request, $id)
    {
        $item = ParticipantStudent::findOrFail($id);
        Storage::delete($item->file_raport);
        $item->delete();

        return redirect()
            ->route('pendaftar')
            ->with('message', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
