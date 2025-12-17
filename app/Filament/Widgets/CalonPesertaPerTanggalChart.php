<?php

namespace App\Filament\Widgets;

use App\Models\PesertaCalon;
use Filament\Widgets\ChartWidget;

class CalonPesertaPerTanggalChart extends ChartWidget
{
    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $rows = PesertaCalon::query()
            ->selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->limit(30)
            ->get();

        $labels = $rows->pluck('tanggal')->map(fn ($d) => (string) $d)->all();
        $data = $rows->pluck('jumlah')->map(fn ($n) => (int) $n)->all();

        return [
            'datasets' => [
                [
                    'label' => 'Calon Peserta per Tanggal (created_at)',
                    'data' => $data,
                    'borderColor' => '#F59E0B',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.2)',
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }
}