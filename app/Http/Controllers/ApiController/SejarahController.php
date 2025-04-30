<?php

namespace App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use App\Models\Sejarah;
use App\Models\Visitors;

use Validator;
use Illuminate\Support\Facades\Storage;


class SejarahController extends Controller
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


    public function update_sejarah(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_sejarah'), $file_name);
                    $path = "images/foto_sejarah/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }
                else{

                    $input = array(
                        'sejarah' =>  $request->sejarah,
                        'picture' =>'',
                        'id_desa_skpd' =>  $request->id_desa_skpd,
                        'author' =>  $request->author,
                    );

//                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }

                $input = array(
                    'sejarah' =>  $request->sejarah,
                    'picture' =>$picture,
                    'id_desa_skpd' =>  $request->id_desa_skpd,
                    'author' =>  $request->author,
                );

//                print_r($input);die;



                $data = Sejarah::where('id_desa_skpd', $request["id_desa_skpd"])->first();


                if($data!=''){
                    Sejarah::where('id_desa_skpd',$request["id_desa_skpd"])->update($input);
                    if($data->picture!=''){
                        $path2 = public_path()."/".$data->picture;
                        File::delete($path2);
                    }

                }else{
//                    print_r($input);die;
                    Sejarah::create($input);;
                }

//                print_r();die;



//                $data->save();

//                Sejarah::where('post_id',$request["post_id"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil Diubah']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }




}
