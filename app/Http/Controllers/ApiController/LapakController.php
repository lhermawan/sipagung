<?php

namespace App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use App\Models\Lapak;
use App\Models\Visitors;
use Session;
use App\Providers\AppServiceProvider;


class LapakController extends Controller
{
    public function __construct(Request $request)
    {
        $this->secret_key = $request["secret_key"];
        $this->api_key =env('API_KEY','12345');
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

   public function lapak_desa(Request $request)
   {
       $halaman = 'lapak_desa';
       $title = $request->title;
            if(!empty($title)){
            $lapak = Lapak::query()
            ->where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')
            ->where('nama_produk', 'like', "%" . $title . "%")
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        }else{

            $lapak = Lapak::where('id_desa_skpd', $this->id_desa)->where('status', 'Aktif')->orderBy('created_at', 'DESC')->paginate(6);
        }
        // dd($lapak);
       return view('lapak_desa', compact('halaman', 'lapak', 'title'));
   }

   public function detail_lapak($item)
    {

        $data = Lapak::where('id_produk', $item)->where('id_desa_skpd', $this->id_desa)->first();
        return view('lapak_desa/detail_lapak', compact('data'));

    }



    public function post_lapak(Request $request)
    {
//print_r('masuk');die;

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check >0) {
            try {
                $data = new Lapak();
                $data->nama_produk = $request["nama_produk"];
                $data->deskripsi = $request["deskripsi"];
                $data->penjual = $request["penjual"];
                $data->no_wa = $request["no_wa"];
                $data->satuan = $request["satuan"];
                $data->harga = $request["harga"];
                $data->status = $request["status"];
                $data->picture = $request["picture"];
                $data->id_desa_skpd = $request["id_desa_skpd"];
                $data->author = $request["author"];
                $data->status = $request["status"];


//                $data2['status']= $_POST['status'];


                if ($data->picture && $data->picture->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_lapak'), $file_name);
                    $path = "images/foto_lapak/$file_name";
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
    public function update_lapak(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {
                if ($request["picture"] && $request["picture"]->isValid()) {
                    $file_name = time() . '.' . $request->picture->extension();
                    $request->picture->move(public_path('images/foto_lapak'), $file_name);
                    $path = "images/foto_lapak/$file_name";
                    $picture = $path;
                    $path2 = public_path()."/".$request['old_file'];
                    File::delete($path2);
                }else{
                    return response()->json(['error' => 'true', 'message' => 'fgfgd']);
                }


                $input = array(
                    'nama_produk' => $request->nama_produk,
                    'deskripsi' =>$request->deskripsi,
                    'penjual' => $request->penjual,
                    'no_wa' =>$request->no_wa,
                    'satuan' => $request->satuan,
                    'harga' =>$request->harga,
                    'author' => $request->author,
                    'status' => $request->status,
                    'picture' =>$picture
                );




                Lapak::where('id_produk',$request["id_produk"])->update($input);


                return response()->json(['error' => 'false', 'message' => 'Data berhasil diubah']);


            } catch (\Exception $e) {
                return response()->json(['error' => 'true', 'message' => $e->getMessage(), 'data' => []], 500);
            }


        }else{
            return response()->json(['error' => 'true', 'message' => 'Token Tidak valid']);
        }
    }

    public function delete_lapak(Request $request)
    {

        $token = Auth::user() != '' ?  Auth::user()->token : $this->secret_key;
        $check = $this->authorization($token);
        if ($check > 0) {
            try {

                Lapak::where('id_produk',$request["id_produk"])->delete();
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
