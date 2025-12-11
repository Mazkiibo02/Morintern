<?php

namespace App\Filament\Resources\PenilaianResource\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class PenilaianInfolist
{
    public static function configure(Schema $schema): Schema
    {
return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                    
                TextEntry::make('nama')
                    ->label('Nama Peserta'),
                    
                TextEntry::make('status')
                    ->label('Status')
                    ->badge()
                    ->color('success')
                    ->default('Sudah Dinilai'),
                
                TextEntry::make('nilai_rata_rata')
                    ->label('Nilai Rata-rata')
                    ->numeric(decimalPlaces: 2),
                    
                TextEntry::make('masukan')
                    ->label('Masukan / Catatan'),
                    
                TextEntry::make('file_penilaian')
                    ->label('File Penilaian')
                    ->formatStateUsing(function ($state) {
                        return $state ? basename($state) : 'Tidak ada file';
                    }),
                    
                TextEntry::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime('d M Y H:i')
                    ->timezone('Asia/Jakarta'),
                    
                TextEntry::make('updated_at')
                    ->label('Diperbarui pada')
                    ->dateTime('d M Y H:i')
                    ->timezone('Asia/Jakarta'),
            ]);
    }
}
