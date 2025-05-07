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
class SCJenisKelaminController extends Controller
{
    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');


    }
    public function index(Request $request)
    {
        $url='/summary/jenis_kelamin?secret_key='.$this->secret_key.'&kode_desa='.$this->kd_desa;
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


        $data['s_jenkel'] = json_decode($a);
        $jenis_kelamin=$data['s_jenkel'];
        $totalJumlah = collect($jenis_kelamin)->sum('jumlah');

        foreach($jenis_kelamin as $row) {
            $data['jk'] = $row->jenis_kelamin;
            $data['jml'] = $row->jumlah;
          }

        $data['chart_data'] = json_encode($data);
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
        $jenis_kelamin = collect($jenis_kelamin)->map(function($item) {
            $item->jumlah = (int) str_replace('.', '', $item->jumlah); // konversi '2.433' ke 2433
            return $item;
        })->all();
        $halaman = 'data_jenis_kelamin';
        return view('showcase.demografi.scjeniskelamin',$data, compact('jenis_kelamin','halaman', 'visitors','totalJumlah'));
    }

}
