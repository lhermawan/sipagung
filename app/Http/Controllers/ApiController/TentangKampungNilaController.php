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
use App\Models\Visitors;

use Validator;
use Illuminate\Support\Facades\Storage;

class TentangKampungNilaController extends Controller
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
    public function update_tentang_kampungnila(Request $request)
    {


        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/tentang_kampungnila'), $file_name);
                    $path = "images/tentang_kampungnila/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }
                else{

                    $input = array(
                        'tentang' =>  $request->tentang,
                        'picture' =>'',
                        'id_desa_skpd' =>  $request->id_desa_skpd,
                        'tipe'=> $request->tipe,
                        'author' =>  $request->author,
                    );

                }

                $input = array(
                    'tentang' =>  $request->tentang,
                    'picture' =>$picture,
                    'id_desa_skpd' =>  $request->id_desa_skpd,
                    'tipe'=> $request->tipe,
                    'author' =>  $request->author,
                );





                $data = TentangKampungNila::where('tipe', $request["tipe"])->first();
                // dd($data);die;

                if($data!=''){
                    TentangKampungNila::where('tipe',$request["tipe"])->update($input);
                    if($data->picture!=''){
                        $path2 = public_path()."/".$data->picture;
                        File::delete($path2);
                    }

                }else{

                    TentangKampungNila::create($input);;
                }



                return response()->json(['error' => 'false', 'message' => 'Data berhasil Diubah']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function update_pasar(Request $request)
    {
    //    dd('asa');die;

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/pasarikan_kertamanggala'), $file_name);
                    $path = "images/pasarikan_kertamanggala/$file_name";
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


                $data = PasarIkanKertamanggala::where('id_desa_skpd', $request["id_desa_skpd"])->first();
                // dd($data);die;

                if($data!=''){
                    PasarIkanKertamanggala::where('id_desa_skpd',$request["id_desa_skpd"])->update($input);
                    if($data->picture!=''){
                        $path2 = public_path()."/".$data->picture;
                        File::delete($path2);
                    }

                }else{

                    PasarIkanKertamanggala::create($input);;
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
