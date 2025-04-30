<?php

namespace App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Potensi;
use Illuminate\Support\Facades\File;
use App\Models\PostPotensi;
use App\Models\Visitors;
use App\Models\Category;
use Session;
use DB;
use Carbon\Carbon;
use App\Providers\AppServiceProvider;
use App\Models\Map;
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

//    private function authorization($token)
//    {
////        print_r($token);die;
//        $user = \App\Models\Key::where('key', "$token")
//            ->where('key', $token)
//            ->get();
//        return $user;
//    }

    private function authorization($token)
    {
        if($token==$this->api_key ){
            $user = 1;
        }else{
            $user = 0;
        }
        return $user;
    }




    public function post_potensi(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                    $data = new \App\Models\PostPotensi();
                    $data->category_id = $request["category_id"];
                    $data->title = $request["title"];
                    $data->title_slug = $request["title_slug"];
                    $data->content = $request["content"];
                    $data->potensi_status = $request["potensi_status"];
                    $data->author = $request["author"];
                    $data->date = $request["date"];
                    $data->picture = $request["picture"];
                    $data->time = $request["time"];
                    $data->hits = $request["hits"];
                    $data->id_desa_skpd = $request["id_desa_skpd"];


                    if ($data->picture && $data->picture->isValid()) {
                        $file_name = time() . '.' . $request->picture->extension();
                        $request->picture->move(public_path('images/foto_potensi'), $file_name);
                        $path = "images/foto_potensi/$file_name";
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
    public function update_potensi(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_potensi'), $file_name);
                    $path = "images/foto_potensi/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }


                $isi_potensi=$request["content"];
                $input = array(
                    'category_id' => $request->category_id,
                    'title' => $request->title,
                    'title_slug' =>$request->title_slug,
                    'content' => $isi_potensi,
                    'potensi_status' => $request->potensi_status,
                    'date' =>$request->date,
                    'author' =>$request->author,
                    'time' =>$request->time,
                    'picture' =>$picture
                );

                PostPotensi::where('potensi_id',$request["potensi_id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_potensi(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                PostPotensi::where('potensi_id',$request["potensi_id"])->delete();
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

        $halaman = 'profile/potensi_desa';
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

        return view('profile/potensi_desa', compact('potensi', 'potensi_popular', 'data', 'halaman', 'visitors'));
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

        return view('profile/detail_potensi', compact('data', 'view', 'visitors', 'potensi_lainnya'));

    }


}
