<?php

namespace App\Filament\Resources\PenilaianResource\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;

class PesertaForm
{
    public static function create(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                    
                Section::make('Informasi Peserta')
                    ->schema([
                        Placeholder::make('peserta_info')
                            ->label('Peserta')
                            ->content(function ($get) {
                                $pesertaId = request()->get('peserta_id');
                                if ($pesertaId) {
                                    $peserta = \App\Models\PesertaCalon::find($pesertaId);
                                    if ($peserta) {
                                        return "Nama: {$peserta->nama_lengkap}<br>
                                                Email: {$peserta->email}<br>
                                                Spesialisasi: " . ($peserta->spesialisasi?->nama_spesialisasi ?? '-');
                                    }
                                }
                                return '';
                            })
                            ->columnSpanFull(),
                            
                        Hidden::make('peserta_id')
                            ->default(request()->get('peserta_id')),
                    ]),
                    
                Section::make('Form Penilaian')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Penilai')
                                    ->default(fn () => auth()->user()->name)
                                    ->disabled()
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            
                        Grid::make(1)
                            ->schema([
                                TextInput::make('nilai_rata_rata')
                                    ->label('Nilai Rata-rata')
                                    ->numeric()
                                    ->step(0.01)
                                    ->required()
                                    ->minValue(0)
                                    ->maxValue(100),
                            ]),
                            
                        Grid::make(1)
                            ->schema([
                                Textarea::make('masukan')
                                    ->label('Kritik / Saran')
                                    ->rows(4)
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                            
                        Grid::make(1)
                            ->schema([
                                FileUpload::make('file_penilaian')
                                    ->label('File Penilaian (PDF, maks 10MB)')
                                    ->directory('penilaian')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->preserveFilenames()
                                    ->maxSize(10240) // 10MB
                                    ->nullable()
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
    
    public static function edit(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                    
                Section::make('Informasi Peserta')
                    ->schema([
                        Placeholder::make('peserta_info')
                            ->label('Peserta')
                            ->content(function ($record) {
                                if ($record && $record->peserta) {
                                    $peserta = $record->peserta;
                                    return "Nama: {$peserta->nama_lengkap}<br>
                                            Email: {$peserta->email}<br>
                                            Spesialisasi: " . ($peserta->spesialisasi?->nama_spesialisasi ?? '-');
                                }
                                return '';
                            })
                            ->columnSpanFull(),
                    ]),
                    
                Section::make('Form Penilaian')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Penilai')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                            
                        Grid::make(1)
                            ->schema([
                                TextInput::make('nilai_rata_rata')
                                    ->label('Nilai Rata-rata')
                                    ->numeric()
                                    ->step(0.01)
                                    ->required()
                                    ->minValue(0)
                                    ->maxValue(100),
                            ]),
                            
                        Grid::make(1)
                            ->schema([
                                Textarea::make('masukan')
                                    ->label('Kritik / Saran')
                                    ->rows(4)
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                            
                        Grid::make(1)
                            ->schema([
                                FileUpload::make('file_penilaian')
                                    ->label('File Penilaian (PDF, maks 10MB)')
                                    ->directory('penilaian')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->preserveFilenames()
                                    ->maxSize(10240) // 10MB
                                    ->nullable()
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}