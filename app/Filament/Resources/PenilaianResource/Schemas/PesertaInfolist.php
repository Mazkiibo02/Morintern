<?php

namespace App\Filament\Resources\PenilaianResource\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class PesertaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Peserta Magang')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('nama_lengkap')
                                    ->label('Nama Lengkap'),
                                
                                TextEntry::make('email')
                                    ->label('Email'),
                                
                                TextEntry::make('no_telp')
                                    ->label('No. Telepon'),
                                
                                TextEntry::make('tanggal_daftar')
                                    ->label('Tanggal Pendaftaran')
                                    ->date('d M Y'),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('spesialisasi.nama_spesialisasi')
                                    ->label('Spesialisasi'),
                                
                                TextEntry::make('kelompok_id')
                                    ->label('Kelompok')
                                    ->formatStateUsing(function ($state) {
                                        return $state ? 'Kelompok ' . $state : '-';
                                    }),
                            ]),
                        
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('tanggal_mulai')
                                    ->label('Tanggal Mulai')
                                    ->date('d M Y'),
                                
                                TextEntry::make('tanggal_selesai')
                                    ->label('Tanggal Selesai')
                                    ->date('d M Y'),
                                
                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color('success'),
                            ]),
                    ]),
                
                Section::make('Penilaian')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextEntry::make('penilaian_status')
                                    ->label('Status Penilaian')
                                    ->badge()
                                    ->color(function ($state) {
                                        return $state ? 'success' : 'warning';
                                    })
                                    ->formatStateUsing(function ($state) {
                                        return $state ? \App\Models\PesertaCalon::getPenilaianStatusLabelFor($state) : 'Belum Dinilai';
                                    }),
                                    
                                TextEntry::make('kritik_saran')
                                    ->label('Kritik / Saran')
                                    ->visible(fn ($state) => !empty($state)),
                                    
                                TextEntry::make('file_penilaian')
                                    ->label('File Penilaian')
                                    ->formatStateUsing(function ($state) {
                                        return $state ? basename($state) : 'Tidak ada file';
                                    })
                                    ->visible(fn ($state) => !empty($state)),
                            ])
                    ])
            ]);
    }
}