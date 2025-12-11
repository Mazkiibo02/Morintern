<?php

namespace App\Filament\Resources\PenilaianResource\Tables;

use App\Models\Peserta;
use App\Models\Spesialisasi;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class PesertasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('universitas')
                    ->label('Universitas')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('status.nama_status')
                    ->label('Status')
                    ->badge()
                    ->color('success'),
                    
                TextColumn::make('spesialisasi.nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('kelompok_id')
                    ->label('Kelompok')
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Kelompok ' . $state : '-';
                    })
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('penilaian_status')
                    ->label('Status Penilaian')
                    ->badge()
                    ->color(function ($record) {
                        return $record->penilaian ? 'success' : 'warning';
                    })
                    ->formatStateUsing(function ($record) {
                        return $record->penilaian ? 'Sudah Dinilai' : 'Belum Dinilai';
                    })
                    ->searchable(false),
                    
                TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y')
                    ->sortable(),
                    
                TextColumn::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('universitas')
                    ->options(
                        Peserta::pluck('universitas', 'universitas')
                            ->unique()
                            ->filter()
                            ->sortKeys()
                    )
                    ->label('Universitas'),
                    
                SelectFilter::make('spesialisasi')
                    ->relationship('spesialisasi', 'nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->preload(),
                    
                SelectFilter::make('kelompok_id')
                    ->options(
                        Peserta::pluck('kelompok_id', 'kelompok_id')
                            ->unique()
                            ->filter()
                            ->sortKeys()
                            ->mapWithKeys(function ($item) {
                                return [$item => 'Kelompok ' . $item];
                            })
                    )
                    ->label('Kelompok'),
                    
                SelectFilter::make('penilaian_status')
                    ->options([
                        'sudah' => 'Sudah Dinilai',
                        'belum' => 'Belum Dinilai',
                    ])
                    ->query(function ($query, $state) {
                        if ($state['value'] === 'sudah') {
                            return $query->has('penilaian');
                        } elseif ($state['value'] === 'belum') {
                            return $query->doesntHave('penilaian');
                        }
                    })
                    ->label('Status Penilaian'),
            ])
            ->recordUrl(
                fn ($record) => route('filament.admin.resources.penilaians.view', ['record' => $record])
            )
            ->emptyStateHeading('Tidak ada peserta aktif')
            ->emptyStateDescription('Belum ada peserta magang dengan status aktif.')
            ->emptyStateIcon('heroicon-o-user-group')
            ->striped()
            ->defaultSort('id', 'desc');
    }
}
