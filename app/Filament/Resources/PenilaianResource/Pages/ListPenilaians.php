<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Resources\PenilaianResource;
use App\Models\PesertaCalon;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPenilaians extends ListRecords
{
    protected static string $resource = PenilaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No create action - penilaian dibuat dari detail peserta
        ];
    }
    
    public function getTitle(): string
    {
        return 'Penilaian Peserta Magang';
    }
    
    public function getHeading(): string
    {
        return 'Penilaian Peserta Magang';
    }
    
    public function getSubheading(): ?string
    {
        return 'Klik pada baris untuk melihat detail dan memberikan penilaian';
    }
    
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua Peserta')
                ->icon('heroicon-o-user-group'),
                
            'belum_dinilai' => Tab::make('Belum Dinilai')
                ->icon('heroicon-o-exclamation-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereNull('penilaian_status'))
                ->badge(fn () => PesertaCalon::peserta()
                    ->whereNull('penilaian_status')
                    ->count())
                ->badgeColor('warning'),
                
            'sudah_dinilai' => Tab::make('Sudah Dinilai')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('penilaian_status'))
                ->badge(fn () => PesertaCalon::peserta()
                    ->whereNotNull('penilaian_status')
                    ->count())
                ->badgeColor('success'),
        ];
    }
}
