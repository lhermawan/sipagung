<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Demografi;
use App\Models\RumahdatakuPotensi as Potensi;

class GuestController extends Controller
{

    public function index()
    {
        $demografi = Demografi::find(1);
        return view('showcase.rumah_dataku.demografi', ['demografi' => $demografi]);
    }

    public function potensi()
    {
        $potensi = Potensi::find(1);
        $demografi = Demografi::find(1);
        return view('showcase.rumah_dataku.potensi', ['potensi' => $potensi, 'demografi' => $demografi,]);
    }
}
