<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use App\Filament\Resources\PenilaianResource;
use App\Models\Penilaian;
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
                                    
                                TextInput::make('universitas')
                                    ->label('Universitas')
                                    ->maxLength(255),
                                    
                                TextInput::make('jurusan')
                                    ->label('Jurusan')
                                    ->maxLength(255),
                                    
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
                                    
                                TextInput::make('github')
                                    ->label('GitHub')
                                    ->url()
                                    ->maxLength(255),
                                    
                                TextInput::make('linkedin')
                                    ->label('LinkedIn')
                                    ->url()
                                    ->maxLength(255),
                            ]),
                    ])
                    ->collapsible(),
                    
                Section::make('Penilaian Peserta')
                    ->description(function () {
                        $penilaian = $this->getRecord()->penilaian;
                        return $penilaian 
                            ? 'Update penilaian yang sudah ada' 
                            : 'Berikan penilaian untuk peserta ini';
                    })
                    ->icon('heroicon-o-star')
                    ->schema([
                        Placeholder::make('penilaian_info')
                            ->label('')
                            ->content(function () {
                                $record = $this->getRecord();
                                if ($record->penilaian) {
                                    return "Penilaian terakhir dibuat pada: " . 
                                           $record->penilaian->created_at->format('d M Y H:i');
                                }
                                return 'Peserta ini belum memiliki penilaian.';
                            })
                            ->columnSpanFull(),
                            
                        Grid::make(2)
                            ->schema([
                                TextInput::make('penilaian.nama')
                                    ->label('Nama Penilai')
                                    ->default(fn () => auth()->user()->name)
                                    ->required()
                                    ->maxLength(255),
                                    
                                TextInput::make('penilaian.nilai_rata_rata')
                                    ->label('Nilai Rata-rata')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->step(0.01)
                                    ->suffix('/100')
                                    ->required(),
                            ]),
                            
                        Textarea::make('penilaian.masukan')
                            ->label('Kritik / Saran')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                            
                        FileUpload::make('penilaian.file_penilaian')
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
                ->url(fn () => route('filament.admin.resources.penilaians.index'))
                ->color('gray'),
        ];
    }
    
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record = $this->getRecord();
        
        // Load penilaian data if exists
        if ($record->penilaian) {
            $data['penilaian'] = [
                'nama' => $record->penilaian->nama,
                'nilai_rata_rata' => $record->penilaian->nilai_rata_rata,
                'masukan' => $record->penilaian->masukan,
                'file_penilaian' => $record->penilaian->file_penilaian,
            ];
        } else {
            $data['penilaian'] = [
                'nama' => auth()->user()->name,
            ];
        }
        
        return $data;
    }
    
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $record = $this->getRecord();
        
        // Handle penilaian data separately
        if (isset($data['penilaian'])) {
            $penilaianData = $data['penilaian'];
            $penilaianData['user_id'] = auth()->id();
            $penilaianData['peserta_id'] = $record->id;
            
            if ($record->penilaian) {
                // Update existing penilaian
                $record->penilaian->update($penilaianData);
            } else {
                // Create new penilaian
                Penilaian::create($penilaianData);
            }
            
            unset($data['penilaian']);
        }
        
        return $data;
    }
    
    public function getTitle(): string
    {
        return 'Detail & Penilaian: ' . $this->getRecord()->nama_lengkap;
    }
    
    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.penilaians.index');
    }
    
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data peserta dan penilaian berhasil disimpan';
    }
}