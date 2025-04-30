<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\TentangKampungNila;
use App\Models\PasarIkanKertamanggala;
use App\Models\Pokdakan;
use Illuminate\Support\Facades\URL;


class GapokkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','');
        $this->k_desa =env('K_DESA','');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->m_desa= env('M_DESA');

    }

    private function authorization($token)
    {
        if($token==$this->api_key ){
            $user = 1;
        }else{
            $user = 0;
        }
        return $user;
    }





    public function index()
    {
        if($this->id_desa =='101') {

        $halaman = 'gapokkan_sfv';
        $gapokkan = Pokdakan::where('pokdakan_status', 'Publish')->get();
        $tentang = TentangKampungNila::where('tipe', 'gapokkan')->get();
        return view('kampungnila/gapokkan_sfv', compact('halaman','gapokkan','tentang'));
        }
        else
        {
            return redirect()->route('landingpage');
        }
    }



    public function detail_gapokkan(string $item, Request $request)
    {
        if($this->id_desa =='101') {

        $view = Pokdakan::where('title_slug', $item)->limit(1)->increment('hits');
        $data = Pokdakan::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();
        $potensi_lainnya  = Pokdakan::where('id_desa_skpd', $this->id_desa)->orderBy('created_at', 'DESC')->limit(6)->get();

        $archive = Pokdakan::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) DESC')
        ->where('pokdakan_status', 'Publish')
        ->where('id_desa_skpd', $this->id_desa)
        ->limit(12)
        ->get()->toArray();

        $shareComponent = \Share::page(
            URL::current(),
            'Share berita',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        return view('kampungnila/detail_gapokkan', compact('data', 'view', 'potensi_lainnya','archive','shareComponent'));

        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }

    }
}
