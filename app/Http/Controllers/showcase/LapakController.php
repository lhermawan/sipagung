<?php

namespace App\Http\Controllers\showcase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Lapakdesa};
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class LapakController extends Controller
{
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','12345');
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

   public function lapak_desa(Request $request)
   {
       $halaman = 'lapak_desa';
       $title = $request->title;
            if(!empty($title)){
            $lapak = Lapakdesa::query()
            ->where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')
            ->where('nama_produk', 'like', "%" . $title . "%")
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        }else{

            $lapak = Lapakdesa::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->paginate(6);
        }
        //  dd($lapak);
       return view('showcase.lapakdesa', compact('halaman', 'lapak', 'title'));
   }

   public function detail_lapak($item)
{
    $data = Lapakdesa::where('id_produk', $item)->where('id_desa_skpd', $this->id_desa)->first();

    // Ambil produk lain dari desa yang sama, kecuali produk saat ini
    $related = Lapakdesa::where('id_desa_skpd', $this->id_desa)
        ->where('id_produk', '!=', $item)
        ->inRandomOrder()
        ->limit(4)
        ->get();

    return view('showcase.detail_lapak', compact('data', 'related'));
}
    // public function index()
    // {

    //     $lapakdesas = Lapakdesa::all();

    //     return view('showcase.lapakdesa', [
    //         'lapakdesas' => $lapakdesas
    //     ]);
    // }
}
