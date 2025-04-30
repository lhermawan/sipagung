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

class IndexController extends Controller
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
    public function landingpage()
    {
        $berita = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(6)->get();
        $kategori_1 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->where('category_id', '3')->orderBy('created_at', 'DESC')->take(1)->get();

        $kategori_2 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->where('category_id', '4')->orderBy('created_at', 'DESC')->take(1)->get();
        $kategori_3 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->where('category_id', '5')->orderBy('created_at', 'DESC')->take(1)->get();
        $berita1 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(6)->get();
        $berita_popular  = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();
        $potensi = Potensi::where('id_desa_skpd', $this->id_desa)->where('potensi_status', 'Publish')->orderBy('created_at', 'DESC')->limit(3)->get();
        $data['pengumuman'] = Pengumuman::where('id_desa_skpd', $this->id_desa)->where('status', 'Y')->orderBy('notice_id', 'DESC')->get();

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

        $category = Category::all();

        $url='/api/ciamis/pegawaidesa/';
        $host=$this->e_host.$url;

        $response = Http::withHeaders([
            'C-KEY' => $this->api_key
        ])->GET($host, [
            'id_skpd' => $this->id_desa,
        ]);




        $a = json_decode($response->body(), true);
        $data['pegawaidesa'] = $a;

//        $url2='/api/ciamis/siskedes/';
//        $host2=$this->e_host.$url2;


//        $r_siskedes = Http::withHeaders([
//            'C-KEY' => $this->api_key
//        ])->GET($host2, [
//            'kd_desa' => $this->kd_desa,
//        ]);

//        $dt_desa = json_decode($r_siskedes->body(), true);
//        $data['datadesa'] = $dt_desa;
        $data['halaman'] ='landingpage';
//        $header = Header::all();
        $header = Header::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->get();
        $berita_new = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->take(1)->get();
         return view('landingpage',$data, compact('berita','berita1','header','data','category', 'potensi','visitors', 'berita_popular', 'berita_new','kategori_1','kategori_2','kategori_3'));


    }




    public function viewDataBerita(string $item, Request $request)
    {
        $data1 = $request->session()->all();
        $data = Berita::where('title_slug', $item)->first();
        $berita_baru = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(5)->get();
        $berita_popular  = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();
        return view('berita/detail_berita', compact('data','data1', 'berita_baru', 'berita_popular'));

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
