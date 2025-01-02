<?php

namespace App\Http\Controllers;

use App\Models\IjazahStudent;
use App\Models\ParticipantStudent;
use App\Models\WaliStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datadiri = ParticipantStudent::where('user_id', Auth::id())->get();
        $item = ParticipantStudent::with('user')->where('user_id', Auth::id())->first();
        $wali = WaliStudent::where('user_id', Auth::id())->get();
        $ijazah = IjazahStudent::where('user_id', Auth::id())->get();
        return view('landing.index', [
            'datadiri' => $datadiri,
            'item' => $item,
            'wali' => $wali,
            'ijazah' => $ijazah,
        ]);
    }

    public function updateWali(Request $request, $id)
    {
        $data = $request->all();
        $item = WaliStudent::find($id);
        $item->update($data);
        return back()->with('message', 'SUKSES');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
