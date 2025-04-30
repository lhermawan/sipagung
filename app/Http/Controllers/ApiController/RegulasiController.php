<?php

namespace App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\Regulasi;
use Validator;


class RegulasiController extends Controller
{
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','');
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
    public function post_regulasi(Request $request)
    {
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check  > 0) {
            try {
//                print_r('masuk');die;


                $validator = Validator::make($request->all(),[
                    'file' => 'required|mimes:pdf|max:5048',
                    'tahun' => 'required|integer',
                ]);

                if($validator->fails()) {

                    return response()->json(['error' => 'true', 'message'=>$validator->errors()], 401);
                }

                if ($file = $request->file('file')) {
//                    $path = $file->store('public/files');
                    $file_name = time() . '.' . $request->file->extension();
                    $request->file->move(public_path('files/produk_hukum'), $file_name);
                    $path = "files/produk_hukum/$file_name";

                    //store your file into directory and db
                    $data = new Regulasi();
                    $data->judul = $request["judul"];
                    $data->jenis = $request["jenis"];
                    $data->tahun = $request["tahun"];
                    $data->status_post = $request["status_post"];
                    $data->id_desa_skpd = $request["id_desa_skpd"];
                    $data->author = $request["author"];
                    $data->file= $path;
                    $data->save();

                    return response()->json([
                        "success" => true,
                        "message" => "File successfully uploaded",
                        "file" => $file
                    ]);

                }

            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }

    }

    public function update_regulasi(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                $input = array(
                    'judul' => $request->judul,
                    'jenis' =>$request->jenis,
                    'author' => $request->author,
                    'tahun' => $request->tahun,
                    'status_post' => $request->status_post,
                );

                Regulasi::where('id',$request["id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil ditambahkan']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_regulasi(Request $request)
    {


        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);


        if ($check >0) {
            try {
                Regulasi::where('id',$request["post_id"])->delete();
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
