<?php

namespace App\Filament\Resources\PostinganMagangs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PostinganMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Select::make('spesialisasi_id')
                    ->label('Spesialisasi')
                    ->relationship('spesialisasi', 'nama_spesialisasi')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('durasi')
                    ->required(),
                TextInput::make('kuota')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('ilustrasi'),
            ]);
    }
}
