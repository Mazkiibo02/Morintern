<?php

namespace App\Filament\Widgets;

use App\Models\PostinganMagang;
use App\Models\Peserta;
use App\Models\PesertaCalon;
use App\Models\Spesialisasi;
use Illuminate\Support\Facades\Schema;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalPostingan = PostinganMagang::count();
        $totalPesertaAktif = Peserta::query()
            ->when(Schema::hasColumn('pesertas', 'status'), fn($q) => $q->where('status', 'peserta'))
            ->count();
        $totalCalon = PesertaCalon::count();
        $totalSpesialisasi = Spesialisasi::count();

        return [
            Stat::make('Postingan Magang', (string) $totalPostingan),
            Stat::make('Peserta Aktif', (string) $totalPesertaAktif),
            Stat::make('Calon Peserta', (string) $totalCalon),
            Stat::make('Spesialisasi', (string) $totalSpesialisasi),
        ];
    }
}