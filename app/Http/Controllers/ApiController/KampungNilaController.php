<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use App\Models\KampungNila;
use App\Models\TestimoniKampungNila;
use App\Models\Category;
use App\Models\Visitors;
use Session;
use DB;
use Carbon\Carbon;
use App\Providers\AppServiceProvider;
use App\Models\Map;
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

    public function post_kampung_nila(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                    $data = new \App\Models\KampungNila();
                    $data->title = $request["title"];
                    $data->title_slug = $request["title_slug"];
                    $data->content = $request["content"];
                    $data->post_status = $request["post_status"];
                    $data->author = $request["author"];
                    $data->date = $request["date"];
                    $data->picture = $request["picture"];
                    $data->time = $request["time"];
                    $data->hits = $request["hits"];
                    $data->id_desa_skpd = $request["id_desa_skpd"];


                    if ($data->picture && $data->picture->isValid()) {
                        $file_name = time() . '.' . $request->picture->extension();
                        $request->picture->move(public_path('images/foto_berita'), $file_name);
                        $path = "images/foto_berita/$file_name";
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

    public function update_berita_kampungnila(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_berita'), $file_name);
                    $path = "images/foto_berita/$file_name";
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
                    'post_status' => $request->post_status,
                    'date' =>$request->date,
                    'time' =>$request->time,
                    'picture' =>$picture
                );
                // dd($input);die;

                KampungNila::where('post_id',$request["post_id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_berita_kampung_nila(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                KampungNila::where('post_id',$request["post_id"])->delete();
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

    public function berita_kampungnila(Request $request)
    {

        if($this->id_desa =='101'){

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

        $halaman = 'berita_kampungnila';

        $berita_popular  = KampungNila::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();
        $archive = Berita::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) DESC')
        ->where('id_desa_skpd', $this->id_desa)
        ->where('post_status', 'Publish')
        ->limit(12)
        ->get()->toArray();

        $title = $request->title;
            if(!empty($title)){
            $berita = KampungNila::query()
            ->where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')
            ->where('title', 'like', "%" . $title . "%")
            ->orderBy('created_at', 'DESC')
            ->paginate(4);

        }else{

            $berita = KampungNila::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->paginate(4);
        }

        return view('kampungnila/berita_kampungnila', compact('berita','data','berita_popular','archive'));
        }
        else
        {
            return redirect()->route('landingpage');
        }
    }

    public function detail_berita_kampungnila(string $item, Request $request)
    {
        if($this->id_desa =='101'){

        $view = KampungNila::where('title_slug', $item)->limit(1)->increment('hits');
        $shareComponent = \Share::page(
            URL::current(),
            'Share berita',
        )
        ->facebook()
        ->twitter()
        ->telegram()
        ->whatsapp();

        $data = KampungNila::where('title_slug', $item)->where('id_desa_skpd', $this->id_desa)->first();
        $berita_baru = KampungNila::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(5)->get();
        $berita_popular  = KampungNila::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();


        $archive = KampungNila::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) DESC')
        ->where('post_status', 'Publish')
        ->where('id_desa_skpd', $this->id_desa)
        ->limit(12)
        ->get()->toArray();

        
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

        return view('kampungnila/detail_berita_kampungnila', compact('data', 'view', 'archive','berita_baru', 'berita_popular','visitors','shareComponent'));

        }
        else
        {
            return redirect()->route('landingpage');
        }

    }

    public function arsip_berita_kampungnila($month, $year, Request $request)
    {
        if($this->id_desa =='101'){

        $berita_post1 = KampungNila::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish');
        if ($month= request('month')) {
                $berita_post1->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if ($year = request('year')) {
            $berita_post1->whereYear('created_at', $year);
        }


        $berita = $berita_post1->orderBy('created_at', 'DESC')->paginate(4);
        $berita_popular  = KampungNila::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('hits', 'DESC')->limit(6)->get();

        $archive = KampungNila::selectRaw('year(created_at) year, monthname(created_at) month, count(*) post ')
        ->groupBy('year', 'month')
        ->where('post_status', 'Publish')
        ->where('id_desa_skpd', $this->id_desa)
        ->limit(5)
        ->orderByRaw('min(created_at) DESC')
        ->get()->toArray();

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

        return view('kampungnila/arsip_berita_kampungnila', compact('berita','archive','visitors', 'berita_popular'));
        }
        else
        {
            return redirect()->route('landingpage');
        }

    }

    public function galeri_kampungnila(Request $request)
    {
        if($this->id_desa =='101'){

        $halaman ='galeri_kampungnila';
        return view('kampungnila/galeri_kampungnila', compact('halaman'));

        }
        else
        {
            return redirect()->route('landingpage');
        }

    }

    public function delete_testimoni_kampungnila(Request $request)
    {
        // dd('sasa');die;

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                TestimoniKampungNila::where('id_testimoni',$request["id_testimoni"])->delete();
                $path2 = public_path()."/".$request['avatar'];
                File::delete($path2);
                return response()->json(['error' => 'false', 'message' => 'Data Berhasil Dihapus']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function update_testimoni_kampungnila(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                $input = array(
                    'status' => $request->status,
                );
                // dd($input);die;

                TestimoniKampungNila::where('id_testimoni',$request["id_testimoni"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }

    }
   
}
