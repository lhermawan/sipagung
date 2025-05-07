<?php

namespace App\Http\Controllers\showcase\demografi;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;
use App\Models\Visitors;
use Illuminate\Pagination\LengthAwarePaginator;
use GuzzleHttp\Client;

class SCAgamaController extends Controller
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

        $agama = json_decode($a);
// dd($agama);
// Convert to array of objects
$agama = collect($agama)->map(function ($jumlah, $key) {
    return (object)[
        'agama' => ucfirst($key),
        'jumlah' => $jumlah,
    ];
})->values();
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





        $agamaData = collect($agama)->map(function ($item) {
            return (object)[
                'agama' => $item->agama ?? 'Tidak Diketahui',
                'jumlah' => $item->jumlah ?? 0,
            ];
        });

        $totalJumlah = $agamaData->sum('jumlah');

        return view('showcase.demografi.scagama', [
            'agama' => $agamaData,
            'totalJumlah' => $totalJumlah,
            'halaman' => 'data_agama',
            'visitors' => $visitors,
        ]);
    }

}
