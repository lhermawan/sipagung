<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\TentangKampungNila;
use App\Models\TestimoniKampungNila;
use App\Models\PengelolaKampungNila;
use App\Models\PasarIkanKertamanggala;
use App\Models\MinaEduwisata;
use App\Models\PengolahanIkan;
use App\Models\NilaMart;
use App\Models\Visitors;
use App\Models\Budidaya;
use App\Models\Resto;
use App\Models\KolamPemancingan;
use Session;
use App\Providers\AppServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\URL;

class KampungNilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','12345');
        $this->k_desa =env('K_DESA','');
        $this->id_desa =env('ID_DESA', '101');
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

   public function kampung_nila(Request $request)
   {

    if($this->id_desa =='101'){
    
       $halaman = 'kampung_nila';
       $tentang = TentangKampungNila::where('tipe', 'kampungnila')->get();
       $pengelola = PengelolaKampungNila::all();
       $testimoni = TestimoniKampungNila::where('status', 'Active')->get();
            return view('kampung_nila', compact('halaman','tentang','pengelola','testimoni'));
        }
        else
        {
            return redirect()->route('landingpage');
        }
       
   }

   public function testimoni(Request $request)
   {

        if($this->id_desa =='101'){
            $halaman = 'testimoni';
            return view('kampungnila.testimoni', compact('halaman'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }

   public function saveTestimoni(Request $request)
    {
        $request->validate([ 
            'nama'            => 'required',
            'email'           => 'required',
            'avatar'          => 'required|image',
            'rating'          => 'required',
            'komentar'        => 'required',
            'status'          => 'required',
        ]);

        $image = time().'.'.$request->avatar->extension();  
        $request->avatar->move(public_path('images/foto_testimoni'), $image);
    
        $form = new TestimoniKampungNila;
        $form->nama                           = $request->nama;
        $form->email                          = $request->email;
        $form->rating                         = $request->rating;
        $form->komentar                       = $request->komentar;
        $form->status                         = $request->status;
        $form->avatar                         = $image;


        // dd($form);die;

        $form->save();
        Toastr::success('Testimoni anda sudah berhasil disimpan :)','Success');
        return redirect()->route('kampungnila/testimoni');
    }

    public function sfv_kampungnila(Request $request)
   {

        if($this->id_desa =='101'){
            $halaman = 'sfv_kampungnila';
            return view('kampungnila.sfv_kampungnila', compact('halaman'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }

   public function pasar_kertamanggala(Request $request)
   {
        // dd('sasa');die;
        if($this->id_desa =='101'){
            $halaman = 'pasar_kertamanggala';
            $tentang = PasarIkanKertamanggala::all();
            return view('kampungnila.pasar_kertamanggala', compact('halaman','tentang'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }


   public function nila_mart(Request $request)
   {

        if($this->id_desa =='101'){
            $halaman = 'nila_mart';
            $data = NilaMart::paginate(4);
            return view('kampungnila.nila_mart', compact('halaman','data'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }

   public function detail_nila_mart(string $item, Request $request)
    {
        $view = NilaMart::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = \Share::page(
            URL::current(),
            'Share Nilamart',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        $data = NilaMart::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();

        return view('kampungnila/detail_nila_mart', compact('data', 'view','shareComponent'));

    }

    public function minaeduwisata(Request $request)
   {

        if($this->id_desa =='101'){
            $halaman = 'minaeduwisata';
            $data = MinaEduwisata::paginate(4);
            return view('kampungnila.minaeduwisata', compact('halaman','data'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }

   public function detail_minaeduwisata(string $item, Request $request)
    {
        $view = MinaEduwisata::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = \Share::page(
            URL::current(),
            'Share Minaeduwisata',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        $data = MinaEduwisata::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();

        return view('kampungnila/detail_MinaEduwisata', compact('data', 'view','shareComponent'));

    }

    public function budidaya(Request $request)
    {
 
         if($this->id_desa =='101'){
             $halaman = 'budidaya';
             $data = Budidaya::paginate(4);
             return view('kampungnila.budidaya', compact('halaman','data'));
         }
             else
             {
                 return redirect()->route('landingpage');
             }
        
    }

    public function detail_budidaya(string $item, Request $request)
    {
        $view = Budidaya::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = \Share::page(
            URL::current(),
            'Share Budidaya',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        $data = Budidaya::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();

        return view('kampungnila/detail_budidaya', compact('data', 'view','shareComponent'));

    }

    public function kolam_pemancingan_lembah_ereng(Request $request)
   {
        // dd('sasa');die;
        if($this->id_desa =='101'){
            $halaman = 'kolam_pemancingan_lembah_ereng';
            $tentang = KolamPemancingan::all();
            return view('kampungnila.kolam_pemancingan_lembah_ereng', compact('halaman','tentang'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }

   public function pengolahan_ikan(Request $request)
   {

        if($this->id_desa =='101'){
            $halaman = 'pengolahan_ikan';
            $data = PengolahanIkan::paginate(3);
            return view('kampungnila.pengolahan_ikan', compact('halaman','data'));
        }
            else
            {
                return redirect()->route('landingpage');
            }
       
   }

   public function detail_pengolahan_ikan(string $item, Request $request)
    {
        $view = PengolahanIkan::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = \Share::page(
            URL::current(),
            'Share Nilamart',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        $data = PengolahanIkan::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();

        return view('kampungnila/detail_pengolahan_ikan', compact('data', 'view','shareComponent'));

    }

    public function resto(Request $request)
    {
 
         if($this->id_desa =='101'){
             $halaman = 'resto';
             $data = Resto::paginate(3);
             return view('kampungnila.resto', compact('halaman','data'));
         }
             else
             {
                 return redirect()->route('landingpage');
             }
        
    }

    public function detail_resto(string $item, Request $request)
    {
        $view = Resto::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = \Share::page(
            URL::current(),
            'Share Nilamart',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        $data = Resto::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();

        return view('kampungnila/detail_resto', compact('data', 'view','shareComponent'));

    }

}
