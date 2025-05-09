<?php

namespace App\Http\Controllers\showcase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\Potensi;

use App\Models\Visitors;

class PotensiController extends Controller
{
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','');
        $this->k_desa =env('K_DESA','');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->m_desa= env('M_DESA');

    }




    public function potensi(Request $request)
    {


//        $client = new GuzzleClient([
//            'C-KEY' => $this->api_key
//        ]);
        $url='/api/ciamis/pegawaidesa/';
        $host=$this->e_host.$url;

        $response = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host, [
            'id_skpd' => $this->id_desa,
        ]);

        $a = json_decode($response->body(), true);
        $data['pegawaidesa'] = $a;

        $halaman = 'showcase/potensi/potensi_desa';
        $potensi = Potensi::where('id_desa_skpd', $this->id_desa)->where('potensi_status', 'Publish')->orderBy('created_at', 'DESC')->paginate(6);
        $potensi_popular  = Potensi::where('id_desa_skpd', $this->id_desa)->orderBy('hits', 'DESC')->limit(6)->get();
        // $map = Map::where('kode_desa', $this->m_desa )->get();
//        print_r($map);die;

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
            // dd($potensi);
        return view('showcase.potensi.potensi_desa', compact('potensi', 'potensi_popular', 'data', 'halaman', 'visitors'));
    }

    public function detail_potensi(string $item, Request $request)
    {
        $view = Potensi::where('title_slug', $item)->limit(1)->increment('hits');
        $data = Potensi::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();
        $potensi_lainnya  = Potensi::where('id_desa_skpd', $this->id_desa)->orderBy('created_at', 'DESC')->limit(6)->get();
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

        return view('showcase.potensi.detail_potensi_desa', compact('data', 'view', 'visitors', 'potensi_lainnya'));

    }


}
