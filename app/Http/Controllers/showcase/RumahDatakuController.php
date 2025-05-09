<?php

namespace App\Http\Controllers\showcase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RumahDatakuController extends Controller
{
    public function index(Request $request)
    {


        $halaman = 'rumahdataku';
        return view('showcase.rumah_dataku.rumahdataku' , compact('halaman'));
    }
}
