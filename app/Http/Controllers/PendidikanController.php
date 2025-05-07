<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use PDF;

class PendidikanController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->level == 'Admin') {
            $penduduk = Penduduk::orderBy('nik', 'asc')->get();
        } else {
            $penduduk = Penduduk::where('dusun', $user->level)->orderBy('nik', 'asc')->get();
        }

        $pendidikanCategories = [
            'Tidak/Belum Sekolah',
            'Tidak Tamat SD/Sederajat',
            'Tamat SD/Sederajat',
            'SLTP/Sederajat',
            'SLTA/Sederajat',
            'Akademi/Diploma III/S. Muda',
            'Diploma I/II',
            'Diploma IV/Strata I',
            'Strata II',
            'Strata III',
            'Pendidikan Non-Formal',
            'Pendidikan Khusus'
        ];

        $pendidikanData = [];

        foreach ($pendidikanCategories as $pendidikan) {
            $total = $penduduk->where('pendidikan', $pendidikan)->count();
            $laki_laki = $penduduk->where('pendidikan', $pendidikan)->where('jenis_kelamin', 'Laki-laki')->count();
            $perempuan = $penduduk->where('pendidikan', $pendidikan)->where('jenis_kelamin', 'Perempuan')->count();

            $jumlahPercent = $total ? ($total / $penduduk->count()) * 100 : 0;
            $lakiLakiPercent = $total ? ($laki_laki / $total) * 100 : 0;
            $perempuanPercent = $total ? ($perempuan / $total) * 100 : 0;

            $pendidikanData[] = [
                'pendidikan' => $pendidikan,
                'jumlah_n' => $total,
                'jumlah_percent' => number_format($jumlahPercent, 2),
                'laki_laki_n' => $laki_laki,
                'laki_laki_percent' => number_format($lakiLakiPercent, 2),
                'perempuan_n' => $perempuan,
                'perempuan_percent' => number_format($perempuanPercent, 2),
            ];
        }

        $total_jumlah_n = array_sum(array_column($pendidikanData, 'jumlah_n'));
        $total_jumlah_percent = $total_jumlah_n ? number_format(($total_jumlah_n / $penduduk->count()) * 100, 2) : 0;
        $total_laki_laki_n = array_sum(array_column($pendidikanData, 'laki_laki_n'));
        $total_laki_laki_percent = $total_jumlah_n ? number_format(($total_laki_laki_n / $total_jumlah_n) * 100, 2) : 0;
        $total_perempuan_n = array_sum(array_column($pendidikanData, 'perempuan_n'));
        $total_perempuan_percent = $total_jumlah_n ? number_format(($total_perempuan_n / $total_jumlah_n) * 100, 2) : 0;

        return view('demografi.pendidikan.pendidikan', [
            'penduduk' => $penduduk,
            'pendidikanData' => $pendidikanData,
            'total_jumlah_n' => $total_jumlah_n,
            'total_jumlah_percent' => $total_jumlah_percent,
            'total_laki_laki_n' => $total_laki_laki_n,
            'total_laki_laki_percent' => $total_laki_laki_percent,
            'total_perempuan_n' => $total_perempuan_n,
            'total_perempuan_percent' => $total_perempuan_percent,
        ]);
    }
}
