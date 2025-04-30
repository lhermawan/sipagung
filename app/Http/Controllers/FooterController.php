<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FooterController extends Controller
{
    public function index()
    {

    $url1='/api/ciamis/detaildesa/';
    $host1=$this->e_host.$url1;

    $response = Http::withHeaders([
        'C-KEY' => $this->api_key
    ])->GET($host1, [
        'id_skpd' => $this->id_desa,
    ]);

    $b = json_decode($response->body(), true);
    $data1['detaildesa'] = $b;
    $data1['halaman'] ='footer';
    //   dd($data1);
     return view('layouts/footer',$data1, compact('data1'));
    }
}
