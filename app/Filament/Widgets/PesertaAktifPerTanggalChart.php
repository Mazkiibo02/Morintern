<?php

namespace App\Filament\Widgets;

use App\Models\PesertaCalon;
use Filament\Widgets\ChartWidget;

class PesertaAktifPerTanggalChart extends ChartWidget
{
    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $rows = PesertaCalon::query()
            ->peserta()
            ->whereNotNull('tanggal_daftar')
            ->selectRaw('DATE(tanggal_daftar) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->limit(30)
            ->get();

        $labels = $rows->pluck('tanggal')->map(fn ($d) => (string) $d)->all();
        $data = $rows->pluck('jumlah')->map(fn ($n) => (int) $n)->all();

        return [
            'datasets' => [
                [
                    'label' => 'Peserta Aktif per Tanggal (tanggal_daftar)',
                    'data' => $data,
                    'borderColor' => '#22C55E',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }
}