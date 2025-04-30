<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\ProdukSFVKampungnila;
use App\Models\Visitors;
use Session;
use DB;
use Carbon\Carbon;
use App\Providers\AppServiceProvider;
use App\Models\Map;
use Illuminate\Support\Facades\URL;

class ProdukSPFController extends Controller
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

    private function authorization($token)
    {
        if($token==$this->api_key ){
            $user = 1;
        }else{
            $user = 0;
        }
        return $user;
    }

    public function post_kampung_nila_produksfv(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                    $data = new \App\Models\ProdukSFVKampungnila();
                    $data->title = $request["title"];
                    $data->title_slug = $request["title_slug"];
                    $data->content = $request["content"];
                    $data->post_status = $request["post_status"];
                    $data->author = $request["author"];
                    $data->date = $request["date"];
                    $data->picture = $request["picture"];
                    $data->time = $request["time"];
                    $data->hits = $request["hits"];
                    $data->jenis_paket = $request["jenis_paket"];
                    $data->id_desa_skpd = $request["id_desa_skpd"];


                    if ($data->picture && $data->picture->isValid()) {
                        $file_name = time() . '.' . $request->picture->extension();
                        $request->picture->move(public_path('images/foto_produksfv'), $file_name);
                        $path = "images/foto_produksfv/$file_name";
                        $data->picture = $path;
                    }else{
                        return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                    }

                    $data->save();
                    return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function update_produksfv_kampungnila(Request $request)
    {
        // dd('a');die;
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_paketmina'), $file_name);
                    $path = "images/foto_paketmina/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }

                $isi_berita=$request["content"];
                $input = array(
                    'title' => $request->title,
                    'title_slug' =>$request->title_slug,
                    'content' => $isi_berita,
                    'jenis_paket' => $request->jenis_paket,
                    'post_status' => $request->post_status,
                    'date' =>$request->date,
                    'time' =>$request->time,
                    'picture' =>$picture
                );

                // dd($input);die;

                ProdukSFVKampungnila::where('post_id',$request["post_id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function index()
    {
        if($this->id_desa =='101') {
        
        $halaman = 'produk_sfv_kampungnila';
        $paket = ProdukSFVKampungnila::where('post_status', 'Publish')->paginate(4);
        return view('kampungnila/produk_sfv_kampungnila', compact('halaman','paket'));
        }
        else
        {
            return redirect()->route('landingpage');
        }
    }

    public function delete_produksfv_kampungnila(Request $request)
    {
        // dd('a');die;

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                ProdukSFVKampungnila::where('post_id',$request["post_id"])->delete();
                $path2 = public_path()."/".$request['picture'];
                File::delete($path2);
                return response()->json(['error' => 'false', 'message' => 'Data Berhasil Dihapus']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function detail_produk_sfv_kampungnila(string $item, Request $request)
    {
        if($this->id_desa =='101') {

        $view = ProdukSFVKampungnila::where('title_slug', $item)->limit(1)->increment('hits');
        $data = ProdukSFVKampungnila::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();
        $potensi_lainnya  = ProdukSFVKampungnila::where('id_desa_skpd', $this->id_desa)->orderBy('created_at', 'DESC')->limit(6)->get();

        $archive = ProdukSFVKampungnila::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) DESC')
        ->where('post_status', 'Publish')
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

        return view('kampungnila/detail_produk_sfv_kampungnila', compact('data', 'view', 'potensi_lainnya','archive','shareComponent'));

        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }

    }
}
