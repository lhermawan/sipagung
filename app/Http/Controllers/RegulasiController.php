<?php

namespace App\Http\Controllers;
use App\Http\Controller\IndexController;
use Illuminate\Http\Request;
use App\Models\Regulasi;
use App\Providers\AppServiceProvider;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        return view('regulasi' , compact('regulasi','halaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
