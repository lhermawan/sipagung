<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use App\Models\PengelolaKampungNila;

use App\Providers\AppServiceProvider;

class PengelolaKampungNilaController extends Controller
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




    public function kampungnila_pengelola(Request $request)
    {


        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
//        print_r($token);die;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                $data = new \App\Models\PengelolaKampungNila();
                $data->nama = $request["nama"];
                $data->picture = $request["picture"];
                $data->author = $request["author"];
                $data->id_desa_skpd = $request["id_desa_skpd"];

            //    dd($data);die;


                if ($data->picture && $data->picture->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_pengelola_kampung_nila'), $file_name);
                    $path = "images/foto_pengelola_kampung_nila/$file_name";
                    $data->picture = $path;
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }
                // dd($data);die;
                $data->save();
                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }
    public function update_kampungnila_pengelola(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_pengelola_kampung_nila'), $file_name);
                    $path = "images/foto_pengelola_kampung_nila/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }


                $input = array(
                    'nama' => $request->nama,
                    'author' =>$request->author,
                    'picture' =>$picture
                );



                PengelolaKampungNila::where('id_pengelola',$request["id_pengelola"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil diubah']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_kampungnila_pengelola(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                PengelolaKampungNila::where('id_pengelola',$request["id_pengelola"])->delete();
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
