<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Resources\PenilaianResource\PenilaianResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPenilaian extends EditRecord
{
    protected static string $resource = PenilaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
