<?php

namespace App\Http\Controllers;

use App\Models\Potensi;
use App\Http\Requests\StorePotensiRequest;
use App\Http\Requests\UpdatePotensiRequest;

class PotensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'potensi_desa';
        $potensi = Potensi::all();
        // dd($sejarah);
        return view('profile/potensi_desa', compact('potensi','halaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePotensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePotensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function show(Potensi $potensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Potensi $potensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePotensiRequest  $request
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePotensiRequest $request, Potensi $potensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Potensi  $potensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Potensi $potensi)
    {
        //
    }
}
