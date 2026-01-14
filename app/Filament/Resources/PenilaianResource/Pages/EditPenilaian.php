<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Resources\PenilaianResource;
use App\Filament\Resources\PenilaianResource\Schemas\PesertaForm;
use App\Models\Penilaian;
use App\Models\PesertaCalon;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaian extends EditRecord
{
    protected static string $resource = PenilaianResource::class;

    protected static string $model = Penilaian::class;

    public function form(
        \Filament\Schemas\Schema $schema
    ): \Filament\Schemas\Schema {
        return \App\Filament\Resources\PenilaianResource\Schemas\PesertaForm::edit($schema);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Update the user ID to current user if changed
        $data['user_id'] = auth()->id();
        
        return $data;
    }

    protected function getRedirect(): string
    {
        $pesertaId = $this->record->peserta_id;
        if ($pesertaId) {
            return route('filament.admin.resources.penilaian-resource.view', $pesertaId);
        }
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        $pesertaId = $this->record->peserta_id;
        if ($pesertaId) {
            $peserta = PesertaCalon::find($pesertaId);
            if ($peserta) {
                return 'Edit Penilaian: ' . $peserta->nama_lengkap;
            }
        }
        return 'Edit Penilaian';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->label('Lihat Detail Peserta')
                ->url(function () {
                    $pesertaId = $this->record->peserta_id;
                    if ($pesertaId) {
                        return route('filament.admin.resources.penilaian-resource.view', $pesertaId);
                    }
                    return $this->getResource()::getUrl('index');
                }),
            
            Actions\Action::make('cancel')
                ->label('Batal')
                ->icon('heroicon-o-x-mark')
                ->url(function () {
                    $pesertaId = $this->record->peserta_id;
                    if ($pesertaId) {
                        return route('filament.admin.resources.penilaian-resource.view', $pesertaId);
                    }
                    return $this->getResource()::getUrl('index');
                }),
        ];
    }
}
