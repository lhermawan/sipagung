<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\TentangKampungNila;
use App\Models\PasarIkanKertamanggala;
use App\Models\Pokdakan;
use App\Models\Visitors;

use Validator;
use Illuminate\Support\Facades\Storage;

class PokdakanController extends Controller
{
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','12345');
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

    public function post_kampung_nila_pokdakan(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                $data = new \App\Models\Pokdakan();
                $data->title = $request["title"];
                $data->title_slug = $request["title_slug"];
                $data->content = $request["content"];
                $data->pokdakan_status = $request["pokdakan_status"];
                $data->author = $request["author"];
                $data->date = $request["date"];
                $data->picture = $request["picture"];
                $data->time = $request["time"];
                $data->alamat = $request["alamat"];
                $data->hits = $request["hits"];
                $data->tgl_berdiri = $request["tgl_berdiri"];
                $data->ketua_kelompok = $request["ketua_kelompok"];
                $data->id_desa_skpd = $request["id_desa_skpd"];

                              if ($data->picture && $data->picture->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/pokdakan_kampungnila'), $file_name);
                    $path = "images/pokdakan_kampungnila/$file_name";
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

    public function update_kampung_nila_pokdakan(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/pokdakan_kampungnila'), $file_name);
                    $path = "images/pokdakan_kampungnila/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }


                $conten=$request["content"];
                $input = array(
                    'title' => $request->title,
                    'alamat' => $request->alamat,
                    'title_slug' =>$request->title_slug,
                    'content' => $conten,
                    'pokdakan_status' => $request->pokdakan_status,
                    'date' =>$request->date,
                    'time' =>$request->time,
                    'picture' =>$picture,
                    'tgl_berdiri' =>$request->tgl_berdiri,
                    'ketua_kelompok' =>$request->ketua_kelompok,

                );

                Pokdakan::where('pokdakan_id',$request["pokdakan_id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_kampung_nila_pokdakan(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                Pokdakan::where('pokdakan_id',$request["pokdakan_id"])->delete();
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
