<?php

namespace App\Filament\Resources\Penilaians\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class PenilaianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Peserta')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nilai_rata_rata')
                    ->label('Nilai Rata-rata')
                    ->numeric()
                    ->step(0.01)
                    ->required(),

                Textarea::make('masukan')
                    ->label('Masukan / Catatan')
                    ->rows(4),

                FileUpload::make('file_penilaian')
                    ->label('File Penilaian (PDF)')
                    ->directory('penilaian')
                    ->acceptedFileTypes(['application/pdf'])
                    ->preserveFilenames()
                    ->maxSize(10240) // 10MB
                    ->nullable(),
            ]);
    }
}