<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\KolamPemancingan;
use App\Models\Visitors;

use Validator;
use Illuminate\Support\Facades\Storage;

class KolamPemancinganController extends Controller
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

    public function update_kolamikan_kampungnila(Request $request)
    {
       
        
        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/tentang_kolam'), $file_name);
                    $path = "images/tentang_kolam/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }
                else{

                    $input = array(
                        'tentang' =>  $request->tentang,
                        'picture' =>'',
                        'id_desa_skpd' =>  $request->id_desa_skpd,
                        'author' =>  $request->author,
                    );

                }

                $input = array(
                    'tentang' =>  $request->tentang,
                    'picture' =>$picture,
                    'id_desa_skpd' =>  $request->id_desa_skpd,
                    'author' =>  $request->author,
                );

               

          

                $data = KolamPemancingan::where('id_desa_skpd', $request["id_desa_skpd"])->first();
                // dd($data);die;

                if($data!=''){
                    KolamPemancingan::where('id_desa_skpd',$request["id_desa_skpd"])->update($input);
                    if($data->picture!=''){
                        $path2 = public_path()."/".$data->picture;
                        File::delete($path2);
                    }

                }else{

                    KolamPemancingan::create($input);;
                }



                return response()->json(['error' => 'false', 'message' => 'Data berhasil Diubah']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }


}
