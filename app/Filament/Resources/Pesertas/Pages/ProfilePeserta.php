<?php

namespace App\Filament\Resources\Pesertas\Pages;

use App\Filament\Resources\Pesertas\PesertaResource;
use Filament\Resources\Pages\Page;

class ProfilePeserta extends Page
{
    protected static string $resource = PesertaResource::class;

    protected string $view = 'filament.resources.pesertas.pages.profile-peserta';
}
