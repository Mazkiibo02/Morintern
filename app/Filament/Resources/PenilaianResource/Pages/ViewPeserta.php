<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Resources\PenilaianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Placeholder;
use App\Models\Spesialisasi;

class ViewPeserta extends EditRecord
{
    protected static string $resource = PenilaianResource::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Peserta')
                    ->description('Data peserta magang yang sedang aktif')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama_lengkap')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(255),
                                    
                                TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                    
                                TextInput::make('no_telp')
                                    ->label('No. Telepon')
                                    ->tel()
                                    ->maxLength(20),
                                    
                                Select::make('spesialisasi_id')
                                    ->label('Spesialisasi')
                                    ->options(Spesialisasi::pluck('nama_spesialisasi', 'id'))
                                    ->searchable()
                                    ->preload(),
                                    
                                DatePicker::make('tanggal_mulai')
                                    ->label('Tanggal Mulai')
                                    ->native(false),
                                    
                                DatePicker::make('tanggal_selesai')
                                    ->label('Tanggal Selesai')
                                    ->native(false)
                                    ->after('tanggal_mulai'),
                            ]),
                    ])
                    ->collapsible(),
                    
                Section::make('Penilaian Peserta')
                    ->description('Berikan atau update penilaian untuk peserta ini')
                    ->icon('heroicon-o-star')
                    ->schema([
                        Placeholder::make('penilaian_info')
                            ->label('')
                            ->content(function () {
                                $record = $this->getRecord();
                                if ($record->penilaian_status) {
                                    return "Status penilaian saat ini: " . $record->penilaian_status;
                                }
                                return 'Peserta ini belum memiliki penilaian.';
                            })
                            ->columnSpanFull(),
                            
                        Select::make('penilaian_status')
                            ->label('Status Penilaian')
                            ->options([
                                'Lulus' => 'Lulus',
                                'Tidak Lulus' => 'Tidak Lulus',
                                'Dalam Evaluasi' => 'Dalam Evaluasi',
                            ])
                            ->required(),
                            
                        Textarea::make('kritik_saran')
                            ->label('Kritik / Saran')
                            ->rows(4)
                            ->columnSpanFull(),
                            
                        FileUpload::make('file_penilaian')
                            ->label('File Penilaian (PDF)')
                            ->directory('penilaian')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240)
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Kembali ke Daftar')
                ->icon('heroicon-o-arrow-left')
                ->url(fn () => route('filament.admin.resources.penilaian.index'))
                ->color('gray'),
        ];
    }
    
    
    public function getTitle(): string
    {
        return 'Detail & Penilaian: ' . $this->getRecord()->nama_lengkap;
    }
    
    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.penilaian.index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data peserta dan penilaian berhasil disimpan';
    }
}