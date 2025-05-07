<?php

namespace App\Http\Controllers;

use App\Models\{Penduduk, Disabilitas, Sejarah, Lapakdesa, Berita};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\Visitors;
use Illuminate\Pagination\LengthAwarePaginator;

class StartController extends Controller
{

    function __construct() {

        $this->secret_key =env('SECRET_KEY');
        $this->id_desa =env('ID_DESA');
        $this->p_host= env('P_HOST');
        $this->kd_desa= env('K_P_DESA');
        $this->p_host_penduduk= env('P_HOST_PENDUDUK');



    }
    public function index(Request $request)
{
    // $client = new Client(['verify' => false]);
    // $allPenduduk = collect();
    // $page = 1;

    // do {
    //     $response = $client->request('GET', 'https://sasakgaluh.ciamiskab.go.id/api/desa/penduduk?secret_key='.$this->secret_key.'&kode_desa='.$this->kd_desa .'&page='. $page);

    //     $result = json_decode($response->getBody());

    //     if (!isset($result->data->data)) break;

    //     $data = collect($result->data->data);
    //     $allPenduduk = $allPenduduk->merge($data);
    //     $page++;

    // } while ($result->data->next_page_url !== null);
    $allPenduduk = Penduduk::all();
    // Filter pekerjaan
    $filtered = $allPenduduk->whereNotIn('pekerjaan', [
        'Mengurus Rumah Tangga', 'Belum/Tidak Bekerja', 'Pelajar/Mahasiswa'
    ]);

    // Hitung pekerjaan terbanyak
    $mostCommonJob = $filtered->countBy('pekerjaan')->sortDesc()->take(1);
    $mostCommonJobName = $mostCommonJob->keys()->first() ?? 'Tidak Diketahui';
    $mostCommonJobCount = $mostCommonJob->values()->first() ?? 0;

    // Data tambahan
    $jumlahKeluarga = $allPenduduk->pluck('no_kk')->unique()->count();
    $disabilitasCount = Disabilitas::count();
    $beritaTerbaru = Berita::where('id_desa_skpd', $this->id_desa)
                            ->where('post_status', 'Publish')
                            ->orderBy('created_at', 'DESC')
                            ->first();
       $penduduk = $allPenduduk->count();
    $lapakdesas = Lapakdesa::all();
    // dd([
    //     'jumlah_data' => $allPenduduk->count(),
    //     'filtered_count' => $filtered->count(),
    //     'pekerjaan_terbanyak' => $mostCommonJobName,
    //     'jumlah_pekerja_terbanyak' => $mostCommonJobCount,
    //     'jumlah_kepala_keluarga' => $jumlahKeluarga,
    // ]);
    // Kirim ke view
    return view('start', compact(
        'beritaTerbaru', 'disabilitasCount', 'jumlahKeluarga',
        'mostCommonJobName', 'mostCommonJobCount', 'lapakdesas' , 'penduduk'
    ));
}
}
