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
                                TextEntry::make('universitas')
                                    ->label('Universitas'),
                                
                                TextEntry::make('jurusan')
                                    ->label('Jurusan'),
                                
                                TextEntry::make('spesialis')
                                    ->label('Spesialis'),
                                
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
                                
                                TextEntry::make('status.nama_status')
                                    ->label('Status')
                                    ->badge()
                                    ->color('success'),
                                
                                TextEntry::make('spesialisasi.nama_spesialisasi')
                                    ->label('Spesialisasi'),
                            ]),
                    ]),
                
                Section::make('Penilaian')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextEntry::make('penilaian_status')
                                    ->label('Status Penilaian')
                                    ->badge()
                                    ->color(function ($record) {
                                        return $record->penilaian ? 'success' : 'warning';
                                    })
                                    ->formatStateUsing(function ($record) {
                                        return $record->penilaian ? 'Sudah Dinilai' : 'Belum Dinilai';
                                    }),
                                    
                                TextEntry::make('penilaian.nama')
                                    ->label('Nama Penilai')
                                    ->hidden(function ($record) {
                                        return $record->penilaian === null;
                                    }),
                                    
                                TextEntry::make('penilaian.nilai_rata_rata')
                                    ->label('Nilai Rata-rata')
                                    ->numeric(decimalPlaces: 2)
                                    ->hidden(function ($record) {
                                        return $record->penilaian === null;
                                    }),
                                    
                                TextEntry::make('penilaian.masukan')
                                    ->label('Masukan / Catatan')
                                    ->hidden(function ($record) {
                                        return $record->penilaian === null;
                                    }),
                                    
                                TextEntry::make('penilaian.file_penilaian')
                                    ->label('File Penilaian')
                                    ->formatStateUsing(function ($state) {
                                        return $state ? basename($state) : 'Tidak ada file';
                                    })
                                    ->hidden(function ($record) {
                                        return $record->penilaian === null;
                                    }),
                                    
                                TextEntry::make('penilaian.created_at')
                                    ->label('Dinilai pada')
                                    ->dateTime('d M Y H:i')
                                    ->timezone('Asia/Jakarta')
                                    ->hidden(function ($record) {
                                        return $record->penilaian === null;
                                    }),
                            ])
                    ])
            ]);
    }
}