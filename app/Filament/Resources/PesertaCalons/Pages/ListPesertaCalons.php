<?php

namespace App\Filament\Resources\PesertaCalons\Pages;

use App\Filament\Resources\PesertaCalons\PesertaCalonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesertaCalons extends ListRecords
{
    protected static string $resource = PesertaCalonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // tombol create kalau masih mau
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\EditAction::make(),

            Actions\Action::make('accept')
                ->label('Terima')
                ->color('success')
                ->icon('heroicon-o-check')
                ->requiresConfirmation()
                ->visible(fn ($record) => $record->status !== 'peserta')
                ->action(fn ($record) => $record->update(['status' => 'peserta'])),
            
            Actions\Action::make('reject')
                ->label('Tolak')
                ->color('danger')
                ->icon('heroicon-o-x-mark')
                ->requiresConfirmation()
                ->visible(fn ($record) => $record->status !== 'ditolak')
                ->action(fn ($record) => $record->update(['status' => 'ditolak'])),

        ];
    }
}
