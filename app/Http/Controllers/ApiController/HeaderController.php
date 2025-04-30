<?php

namespace App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use App\Models\Header;

use App\Providers\AppServiceProvider;
class HeaderController extends Controller
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




    public function post_header(Request $request)
    {


        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
//        print_r($token);die;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                $data = new Header();
                $data->judul = $request["judul"];
                $data->status = $request["status"];
                $data->picture = $request["picture"];
                $data->author = $request["author"];
                $data->id_desa_skpd = $request["id_desa_skpd"];

//                print_r($data);die;


                if ($data->picture && $data->picture->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_header'), $file_name);
                    $path = "images/foto_header/$file_name";
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
    public function update_header(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_header'), $file_name);
                    $path = "images/foto_header/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }


                $input = array(
                    'judul' => $request->judul,
                    'status' =>$request->status,
                    'author' =>$request->author,
                    'picture' =>$picture
                );



                Header::where('id_header',$request["id_header"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil diubah']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_header(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                Header::where('id_header',$request["post_id"])->delete();
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
