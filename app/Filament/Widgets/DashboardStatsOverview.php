<?php

namespace App\Filament\Widgets;

use App\Models\PostinganMagang;
use App\Models\PesertaCalon;
use App\Models\Spesialisasi;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPostingan = PostinganMagang::count();
        $totalPendaftar = PesertaCalon::pendaftar()->count();
        $totalPesertaAktif = PesertaCalon::peserta()->count();
        $totalDitolak = PesertaCalon::ditolak()->count();
        $totalSpesialisasi = Spesialisasi::count();

        return [
            Stat::make('Postingan Magang', (string) $totalPostingan),
            Stat::make('Total Pendaftar', (string) $totalPendaftar),
            Stat::make('Peserta Aktif', (string) $totalPesertaAktif),
            Stat::make('Peserta Ditolak', (string) $totalDitolak),
            Stat::make('Spesialisasi', (string) $totalSpesialisasi),
        ];
    }
}