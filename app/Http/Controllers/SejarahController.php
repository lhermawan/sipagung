<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use App\Models\Visitors;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {

        $this->id_desa =env('ID_DESA');

    }
    public function index(Request $request)
    {


        $halaman = 'sejarah_desa';
        $visitors = Visitors::where('id_desa_skpd', $this->id_desa)->first();

        if($visitors) {
            // session(['session'=>false]);
            if(session('session') != true){
                session(['session'=>true]);
                $visitors->jumlah = $visitors->jumlah + 1;
                $visitors->save();
            }
        }else{
            $visitors = Visitors::create([
                'id_desa_skpd'=> $this->id_desa,
                'jumlah' => 1
            ]);

        }
//        $sejarah = Sejarah::all();
        $sejarah = Sejarah::where('id_desa_skpd', $this->id_desa)->get();

        // dd($sejarah);
        return view('profile/sejarah_desa', compact('sejarah','halaman', 'visitors'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
