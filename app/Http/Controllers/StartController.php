<?php

namespace App\Http\Controllers;

use App\Models\{Penduduk, Disabilitas, Sejarah, Lapakdesa, Berita};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{

    function __construct() {

        $this->api_key =env('API_KEY');
        $this->id_desa =env('ID_DESA');
        $this->e_host= env('E_HOST');
        $this->kd_desa= env('K_DESA');

        }
    public function index(Request $request)
    {
        $penduduk = Penduduk::all();
// dd($penduduk);
        $berita = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(6)->get();
        $kategori_1 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->where('category_id', '3')->orderBy('created_at', 'DESC')->take(1)->get();

        $kategori_2 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->where('category_id', '4')->orderBy('created_at', 'DESC')->take(1)->get();
        $kategori_3 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->where('category_id', '5')->orderBy('created_at', 'DESC')->take(1)->get();
        $berita1 = Berita::where('id_desa_skpd', $this->id_desa)->where('post_status', 'Publish')->orderBy('created_at', 'DESC')->limit(6)->get();
        $beritaTerbaru = Berita::where('id_desa_skpd', $this->id_desa)
                       ->where('post_status', 'Publish')
                       ->orderBy('created_at', 'DESC')
                       ->first();
        // $potensi = Potensi::where('id_desa_skpd', $this->id_desa)->where('potensi_status', 'Publish')->orderBy('created_at', 'DESC')->limit(3)->get();
        $penduduk = Penduduk::count();
        // $disabilitas = Disabilitas::count();
        $pekerjaanCount = Penduduk::distinct('pekerjaan')->count('pekerjaan');
        $jumlahKeluarga = Penduduk::distinct('no_kk')->count('no_kk');
        $pekerjaanStats = Penduduk::select('pekerjaan', DB::raw('count(*) as jumlah'))
            ->whereNotIn('pekerjaan', ['Mengurus Rumah Tangga', 'Belum/Tidak Bekerja', 'Pelajar/Mahasiswa']) // Pengecualian pekerjaan
            ->groupBy('pekerjaan')
            ->orderBy('jumlah', 'desc')
            ->get();

        $mostCommonJob = $pekerjaanStats->first();
        $mostCommonJobName = $mostCommonJob ? $mostCommonJob->pekerjaan : 'Tidak Diketahui';
        $mostCommonJobCount = $mostCommonJob ? $mostCommonJob->jumlah : 0;

        $lapakdesas = Lapakdesa::all();
        // $beritaTerbaru = Berita::orderBy('tanggal', 'desc')->first();

        return view('start', [
            'penduduk' => $penduduk,
            // 'disabilitas' => $disabilitas,
            'pekerjaanCount' => $pekerjaanCount,
            'jumlahKeluarga' => $jumlahKeluarga,
            'mostCommonJobName' => $mostCommonJobName,
            'mostCommonJobCount' => $mostCommonJobCount,
            'lapakdesas' => $lapakdesas,
            'beritaTerbaru' => $beritaTerbaru,

        ]);
    }
}
