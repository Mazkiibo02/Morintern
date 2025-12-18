<?php

namespace App\Filament\Widgets;

use App\Models\Spesialisasi;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class SpesialisasiTable extends TableWidget
{
    protected function getTableQuery(): Builder
    {
        return Spesialisasi::query()
            ->withCount(['postinganMagangs', 'pesertaCalons'])
            ->orderBy('nama_spesialisasi');
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->searchable(),
                TextColumn::make('postingan_magangs_count')
                    ->label('Jumlah Postingan')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('peserta_calons_count')
                    ->label('Jumlah Calon')
                    ->numeric()
                    ->sortable(),
            ]);
    }
}