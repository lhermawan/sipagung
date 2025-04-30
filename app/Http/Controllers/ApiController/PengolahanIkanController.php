<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use App\Models\PengolahanIkan;
use App\Models\Category;
use App\Models\Visitors;
use Session;
use DB;
use Carbon\Carbon;
use App\Providers\AppServiceProvider;
use App\Models\Map;
use Illuminate\Support\Facades\URL;

class PengolahanIkanController extends Controller
{
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

    public function post_kampung_nila_pengolahan(Request $request)
    {
        // dd('sasa');die;
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                    $data = new \App\Models\PengolahanIkan();
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
                        $request->picture->move(public_path('images/foto_pengolahan_ikan'), $file_name);
                        $path = "images/foto_pengolahan_ikan/$file_name";
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

    public function update_pengolahan_kampungnila(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_pengolahan_ikan'), $file_name);
                    $path = "images/foto_pengolahan_ikan/$file_name";
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

                PengolahanIkan::where('pengolahan_id',$request["pengolahan_id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }


    public function delete_pengolahan_kampung_nila(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                PengolahanIkan::where('pengolahan_id',$request["pengolahan_id"])->delete();
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

   
}
