<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Demografi;
use App\Models\RumahdatakuPotensi as Potensi;
use App\Models\Penduduk;
use Carbon\Carbon;

class GuestController extends Controller
{

    public function index()
    {
        $demografi = Demografi::find(1);
        $groups = [
            '0-4' => [0, 4],
            '5-9' => [5, 9],
            '10-14' => [10, 14],
            '15-19' => [15, 19],
            '20-24' => [20, 24],
            '25-29' => [25, 29],
            '30-34' => [30, 34],
            '35-39' => [35, 39],
            '40-44' => [40, 44],
            '45-49' => [45, 49],
            '50-54' => [50, 54],
            '55-59' => [55, 59],
            '60-64' => [60, 64],
            '65+'   => [65, 120],
        ];

        $maleData = [];
        $femaleData = [];

        foreach ($groups as $label => [$min, $max]) {
            $male = Penduduk::where('jenis_kelamin', 'Laki-laki')
                ->whereBetween('tanggal_lahir', [
                    Carbon::now()->subYears($max + 1),
                    Carbon::now()->subYears($min)
                ])->count();

            $female = Penduduk::where('jenis_kelamin', 'Perempuan')
                ->whereBetween('tanggal_lahir', [
                    Carbon::now()->subYears($max + 1),
                    Carbon::now()->subYears($min)
                ])->count();

            $maleData[] = -$male; // negatif agar tampil di kiri
            $femaleData[] = $female;
        }
        $potensi = Potensi::find(1);
        $jumlah_penduduk = Penduduk::count();
        $jumlah_lakilaki = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_perempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_kk = Penduduk::distinct('no_kk')->count('no_kk');

        return view('showcase.rumah_dataku.rumahdataku', [
            'labels' => array_keys($groups),
            'maleData' => $maleData,
            'femaleData' => $femaleData,
            'jumlah_penduduk' => $jumlah_penduduk,
            'jumlah_lakilaki' => $jumlah_lakilaki,
            'jumlah_perempuan' => $jumlah_perempuan,
            'jumlah_kk' => $jumlah_kk,
            'demografi' => $demografi,
            'potensi' => $potensi,
        ]);


    }
    public function demografi()
    {
        $demografi = Demografi::find(1);
        $groups = [
            '0-4' => [0, 4],
            '5-9' => [5, 9],
            '10-14' => [10, 14],
            '15-19' => [15, 19],
            '20-24' => [20, 24],
            '25-29' => [25, 29],
            '30-34' => [30, 34],
            '35-39' => [35, 39],
            '40-44' => [40, 44],
            '45-49' => [45, 49],
            '50-54' => [50, 54],
            '55-59' => [55, 59],
            '60-64' => [60, 64],
            '65+'   => [65, 120],
        ];

        $maleData = [];
        $femaleData = [];
        
        // dd($jumlah_lakilaki);
        foreach ($groups as $label => [$min, $max]) {
            $male = Penduduk::where('jenis_kelamin', 'Laki-laki')
                ->whereBetween('tanggal_lahir', [
                    Carbon::now()->subYears($max + 1),
                    Carbon::now()->subYears($min)
                ])->count();

            $female = Penduduk::where('jenis_kelamin', 'Perempuan')
                ->whereBetween('tanggal_lahir', [
                    Carbon::now()->subYears($max + 1),
                    Carbon::now()->subYears($min)
                ])->count();

            $maleData[] = -$male; // negatif agar tampil di kiri
            $femaleData[] = $female;
        }

        return view('showcase.rumah_dataku.demografi', [
            'labels' => array_keys($groups),
            'maleData' => $maleData,
            'femaleData' => $femaleData,
            'demografi' => $demografi,
        ]);
    }

    public function potensi()
    {
        $potensi = Potensi::find(1);
        $demografi = Demografi::find(1);
        return view('showcase.rumah_dataku.potensi', ['potensi' => $potensi, 'demografi' => $demografi,]);
    }
}
