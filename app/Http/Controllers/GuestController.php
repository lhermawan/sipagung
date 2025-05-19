<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Demografi;
use App\Models\RumahdatakuPotensi as Potensi;
use App\Models\Penduduk;
use App\Models\DataKuantitas;
use Carbon\Carbon;
use App\Models\RdMigrasiDesa;
use App\Models\RdPotensiDesa;
use App\Models\RdPerlindunganSosial;
use App\Models\RdAdministrasiKependudukan;
use App\Models\RdPembangunanKeluarga;
use App\Models\RdKualitas;
use App\Models\Map;

class GuestController extends Controller
{

    function __construct() {
        $this->k_desa =env('K_DESA','');
        $this->m_desa= env('M_DESA');
    }
    public function index()
    {
        // Ambil data agregat dari DataKuantitas
        $data_kuantitas = DataKuantitas::first(); // Mengambil data pertama

        if (!$data_kuantitas) {
            return view('showcase.rumah_dataku.rumahdataku', [
                'message' => 'Data kuantitas belum tersedia'
            ]);
        }
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
        $jumlah_penduduk = Penduduk::count();
        $jumlah_lakilaki = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_perempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_kk = Penduduk::distinct('no_kk')->count('no_kk');


        // Menyiapkan data grafik pie dan bar
        $kontrasepsi = [
            'IUD' => $data_kuantitas->iud,
            'MOW' => $data_kuantitas->mow,
            'MOP' => $data_kuantitas->mop,
            'Implant' => $data_kuantitas->implant,
            'Suntik' => $data_kuantitas->suntik,
            'Pil' => $data_kuantitas->pil,
            'Kondom' => $data_kuantitas->kondom,
        ];

        $tidak_berkb = [
            'IAS' => $data_kuantitas->ias,
            'IAT' => $data_kuantitas->iat,
            'TIAL' => $data_kuantitas->tial,
            'Hamil' => $data_kuantitas->jumlah_ibu_hamil,
        ];

        // Data lainnya
        $ibu_hamil = $data_kuantitas->jumlah_ibu_hamil;
        $pus = $data_kuantitas->jumlah_pasangan_usia_subur;
        $wus = $data_kuantitas->jumlah_wanita_usia_subur;
        $demografi = Demografi::find(1);
        $detail_potensi = RdPotensiDesa::all();
        // dd($detail_potensi);
$map = Map::where('kode_desa', $this->m_desa )->get();
// dd($map);
        $total = [
            'jml_kk_laki' => $detail_potensi->sum('jml_kk_laki'),
            'jml_kk_perempuan' => $detail_potensi->sum('jml_kk_perempuan'),
            'j_penduduk_laki' => $detail_potensi->sum('j_penduduk_laki'),
            'j_penduduk_perempuan' => $detail_potensi->sum('j_penduduk_perempuan'),
            // tambahkan item lain sesuai kebutuhan
        ];
        $potensi = RdPotensiDesa::selectRaw('
    SUM(posyandu) as posyandu,
    SUM(tk_ra) as tk_ra,
    SUM(sd) as sd,
    SUM(smp_sederajat) as smp_sederajat,
    SUM(sma) as sma,
    SUM(pkbm) as pkbm,
    SUM(fasilitas_olahraga) as fasilitas_olahraga,
    SUM(fasilitas_kesehatan) as fasilitas_kesehatan,
    SUM(fasilitas_ibadah) as fasilitas_ibadah,
    SUM(pasar) as pasar,
    SUM(bkb) as bkb,
    SUM(bkr) as bkr,
    SUM(bkl) as bkl,
    SUM(uppka) as uppka,
    SUM(pik_r) as pik_r,
    SUM(stunting_gizi_buruk) as stunting_gizi_buruk,
    SUM(produk_unggulan) as produk_unggulan,
    SUM(luas_jalan) as luas_jalan,
    SUM(j_rw_dusun) as j_rw_dusun,
    SUM(j_rt) as j_rt,
    SUM(luas_wilayah) as luas_wilayah,
    SUM(ketinggian) as ketinggian,
    SUM(j_penduduk_laki) as j_penduduk_laki,
    SUM(j_penduduk_perempuan) as j_penduduk_perempuan,
    SUM(jml_kk_perempuan) as jml_kk_perempuan,
    SUM(jml_kk_laki) as jml_kk_laki
')->first();
        $migrasiDesa = RdMigrasiDesa::orderBy('tahun', 'asc')->get();
        $perlindunganSosial = RdPerlindunganSosial::first();
        $administrasiKependudukan = RdAdministrasiKependudukan::first();
        $pembangunanKeluarga = RdPembangunanKeluarga::all();
        $kualitas = RdKualitas::all();
        // Kirim data ke view
        return view('showcase.rumah_dataku.rumahdataku', [
            'labels' => array_keys($groups),
            'migrasiDesa' => $migrasiDesa,
            'map' => $map,
            'maleData' => $maleData,
            'femaleData' => $femaleData,
            'jumlah_penduduk' => $jumlah_penduduk,
            'jumlah_lakilaki' => $jumlah_lakilaki,
            'jumlah_perempuan' => $jumlah_perempuan,
            'jumlah_kk' => $jumlah_kk,
            'kontrasepsi' => $kontrasepsi,
            'tidak_berkb' => $tidak_berkb,
            'ibu_hamil' => $ibu_hamil,
            'pus' => $pus,
            'wus' => $wus,
            'demografi' => $demografi,
            'detail_potensi' => $detail_potensi,
            'potensi' => $potensi,
            'perlindungan' => $perlindunganSosial,
            'administrasiKependudukan' => $administrasiKependudukan,
            'pembangunanKeluarga' => $pembangunanKeluarga,
            'data' => $kualitas,
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
