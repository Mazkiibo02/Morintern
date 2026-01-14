<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Resources\PenilaianResource;
use App\Filament\Resources\PenilaianResource\Schemas\PesertaForm;
use App\Models\Penilaian;
use App\Models\PesertaCalon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePenilaian extends CreateRecord
{
    protected static string $resource = PenilaianResource::class;

    protected static string $model = Penilaian::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        
        if (request()->has('peserta_id')) {
            $data['peserta_id'] = request()->get('peserta_id');
        }
        
        return $data;
    }

    protected function getRedirect(): string
    {
        $pesertaId = $this->data['peserta_id'] ?? null;
        if ($pesertaId) {
            return route('filament.admin.resources.penilaian-resource.view', $pesertaId);
        }
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        $pesertaId = request()->get('peserta_id');
        if ($pesertaId) {
            $peserta = PesertaCalon::find($pesertaId);
            if ($peserta) {
                return 'Beri Penilaian: ' . $peserta->nama_lengkap;
            }
        }
        return 'Beri Penilaian';
    }
}
