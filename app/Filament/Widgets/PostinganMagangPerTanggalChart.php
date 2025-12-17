<?php

namespace App\Filament\Widgets;

use App\Models\PostinganMagang;
use Filament\Widgets\ChartWidget;

class PostinganMagangPerTanggalChart extends ChartWidget
{
    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $rows = PostinganMagang::query()
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
                    'label' => 'Postingan per Tanggal',
                    'data' => $data,
                    'borderColor' => '#648DDB',
                    'backgroundColor' => 'rgba(100, 141, 219, 0.2)',
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }
}