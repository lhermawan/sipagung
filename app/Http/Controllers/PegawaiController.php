<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

        $this->api_key = env('API_KEY');
        $this->id_desa = env('ID_DESA');
        $this->e_host = env('E_HOST');
    }



public static function get_pegawai(){ // this is just example
    $api_key =env('API_KEY');
    $id_desa =env('ID_DESA');
    $e_host= env('E_HOST');
    $url1='/api/ciamis/detaildesa/';
        $host1=$e_host.$url1;
        $response = Http::withHeaders([
            'C-KEY' => $api_key
        ])->GET($host1, [
            'id_skpd' => $id_desa,
        ]);
        $data = json_decode($response->body(), true);
//        print_r($host1);die;
    if($data==""){
        $data=[""];
        return $table[$data] ?? null;
    }else{
        $data=$data;
    }

        return $data["data"];
}
}
