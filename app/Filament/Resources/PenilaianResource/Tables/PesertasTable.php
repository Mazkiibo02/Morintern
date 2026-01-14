<?php

namespace App\Filament\Resources\PenilaianResource\Tables;

use App\Models\PesertaCalon;
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
                    
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color('success'),
                    
                TextColumn::make('penilaian_status')
                    ->label('Status Penilaian')
                    ->badge()
                    ->color(function ($state) {
                        return $state ? 'success' : 'warning';
                    })
                    ->formatStateUsing(function ($state) {
                        return $state ?: 'Belum Dinilai';
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
                SelectFilter::make('spesialisasi')
                    ->relationship('spesialisasi', 'nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->preload(),
                    
                SelectFilter::make('penilaian_status')
                    ->options([
                        'sudah' => 'Sudah Dinilai',
                        'belum' => 'Belum Dinilai',
                    ])
                    ->query(function ($query, $state) {
                        if ($state['value'] === 'sudah') {
                            return $query->whereNotNull('penilaian_status');
                        } elseif ($state['value'] === 'belum') {
                            return $query->whereNull('penilaian_status');
                        }
                    })
                    ->label('Status Penilaian'),
            ])
            ->recordUrl(
                fn ($record) => route('filament.admin.resources.penilaian.view', ['record' => $record])
            )
            ->emptyStateHeading('Tidak ada peserta aktif')
            ->emptyStateDescription('Belum ada peserta magang dengan status aktif.')
            ->emptyStateIcon('heroicon-o-user-group')
            ->striped()
            ->defaultSort('id', 'desc');
    }
}
