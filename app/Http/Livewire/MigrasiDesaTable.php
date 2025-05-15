<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RdMigrasiDesa;
use Livewire\WithPagination;

class MigrasiDesaTable extends Component
{
    use WithPagination;

    protected $listeners = ['requestChartData'];

    public function requestChartData()
    {
        // Ambil data sesuai halaman saat ini (paginate)
        $chartData = RdMigrasiDesa::orderBy('tahun')->paginate(10);

        $this->emit('sendChartDataToJs', [
            'tahun' => $chartData->pluck('tahun')->toArray(),
            'masuk' => $chartData->pluck('masuk')->toArray(),
            'keluar' => $chartData->pluck('keluar')->toArray(),
            'komuter' => $chartData->pluck('komuter')->toArray(),
            'musiman' => $chartData->pluck('musiman')->toArray(),
        ]);
    }

    public function render()
    {
        $migrasiDesa = RdMigrasiDesa::orderBy('tahun')->paginate(10);

        return view('livewire.migrasi-desa-table', [
            'migrasiDesa' => $migrasiDesa,
        ]);
    }
}
