<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Berita;
use App\Models\Potensi;
use App\Models\Pengumuman;
use App\Models\Header;
use App\Models\Category;
use App\Models\Visitors;

class AparaturDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {

        $this->api_key =env('API_KEY');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->kd_desa= env('K_DESA');

    }

    public function index()
    {
        
        $url='/api/ciamis/pegawaidesa/';
        $host=$this->e_host.$url;

        $response = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host, [
            'id_skpd' => $this->id_desa,
        ]);




        $a = json_decode($response->body(), true);
        $data['pegawaidesa'] = $a;

        $url2='/api/ciamis/siskedes/';
        $host2=$this->e_host.$url2;


        $r_siskedes = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host2, [
            'kd_desa' => $this->kd_desa,
        ]);

        $dt_desa = json_decode($r_siskedes->body(), true);
        $data['datadesa'] = $dt_desa;
        $halaman = 'aparatur_desa';
//        $header = Header::all();
        $header = Header::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->limit(3)->get();
        return view('data_desa/aparatur_desa',$data, compact('header','data', 'halaman'));


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
