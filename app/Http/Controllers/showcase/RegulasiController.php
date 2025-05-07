<?php

namespace App\Http\Controllers\showcase;
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
    function __construct() {

        //        $this->api_key =env('API_KEY');
                $this->id_desa =env('ID_DESA');
        //        $this->e_host= env('E_HOST');
        //        $this->kd_desa= env('K_DESA');

            }

            public function index(Request $request)
            {

                $halaman = 'regulasi';
                $regulasi = Regulasi::where('id_desa_skpd', $this->id_desa)->where('status_post', 'Publikasi')->orderBy('created_at', 'DESC')
                ->paginate(5);

                return view('showcase.regulasi' , compact('regulasi','halaman'));
            }


}
