<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Visitors;
use Illuminate\Support\Facades\Http;

class DataAgamaController extends Controller
{
    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');


    }
    public function index(Request $request)
    {
        $url='/summary/agama?secret_key='.$this->secret_key.'&kode_desa='.$this->kd_desa;
        $host=$this->p_host.$url;
        $client = new Client(['verify' => false ]);
            try {
                $request = $client->request('GET', $host);
            }
            catch(\Exception $e) {
                $error = $e->getResponse();
                $request = $client->request('GET', $host);
            }
        $a = $request->getBody()->getContents();

        $s_agama = json_decode($a);


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





        $halaman = 'data_agama';
        return view('data_desa/data_agama', compact('s_agama','halaman', 'visitors'));
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
