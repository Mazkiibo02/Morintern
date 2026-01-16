<?php

namespace App\Filament\Resources\PesertaCalons;

use App\Filament\Resources\PesertaCalons\Pages;
use App\Models\PesertaCalon;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class PesertaCalonResource extends Resource
{
    protected static ?string $model = PesertaCalon::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Pendaftar';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Peserta';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->pendaftar();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('no_telp')
                    ->label('No. Telepon')
                    ->tel()
                    ->maxLength(20),
                    
                Forms\Components\Select::make('spesialisasi_id')
                    ->label('Spesialisasi')
                    ->relationship('spesialisasi', 'nama_spesialisasi')
                    ->searchable()
                    ->preload(),
                    
                Forms\Components\TextInput::make('universitas')
                    ->label('Universitas')
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->maxLength(255),
                    
                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->native(false),
                    
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->native(false),
                    
                Forms\Components\TextInput::make('github')
                    ->label('GitHub')
                    ->url()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('linkedin')
                    ->label('LinkedIn')
                    ->url()
                    ->maxLength(255),
                    
                Forms\Components\FileUpload::make('cv')
                    ->label('CV (PDF)')
                    ->directory('cv')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(5120)
                    ->downloadable()
                    ->openable(),
                    
                Forms\Components\FileUpload::make('surat')
                    ->label('Surat Lamaran')
                    ->directory('surat')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                    ->maxSize(5120)
                    ->downloadable()
                    ->openable(),

                Forms\Components\Select::make('penilaian_status')
                    ->label('Status Penilaian')
                    ->options([
                        PesertaCalon::PENILAIAN_PENDING => 'Dalam Evaluasi',
                        PesertaCalon::PENILAIAN_LULUS => 'Lulus',
                        PesertaCalon::PENILAIAN_TIDAK_LULUS => 'Tidak Lulus',
                    ])
                    ->nullable(),

                Forms\Components\Textarea::make('kritik_saran')
                    ->label('Kritik & Saran')
                    ->nullable(),

                Forms\Components\FileUpload::make('file_penilaian')
                    ->label('File Penilaian')
                    ->directory('penilaian')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                    ->maxSize(10240)
                    ->downloadable()
                    ->openable(),

                Forms\Components\Select::make('dinilai_oleh')
                    ->label('Dinilai Oleh')
                    ->relationship('dinilaiOleh', 'name')
                    ->nullable(),

                Forms\Components\DateTimePicker::make('dinilai_pada')
                    ->label('Dinilai Pada')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_lengkap')
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp'),
                Tables\Columns\TextColumn::make('universitas')
                    ->label('Universitas')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('spesialisasi.nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        PesertaCalon::STATUS_PENDAFTAR => 'warning',
                        PesertaCalon::STATUS_PESERTA   => 'success',
                        PesertaCalon::STATUS_DITOLAK   => 'danger',
                        default     => 'gray',
                    }),
                    
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Terdaftar Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // No status filter needed since we only show 'pendaftar' status
            ])
            ->actions([
                Actions\ViewAction::make(),
                Actions\Action::make('terima')
                    ->label('Terima')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Terima sebagai Peserta Aktif?')
                    ->modalDescription('Apakah Anda yakin ingin menerima pendaftar ini sebagai peserta aktif?')
                    ->action(function (PesertaCalon $record) {
                        $record->update(['status' => PesertaCalon::STATUS_PESERTA]);
                        
                        Notification::make()
                            ->success()
                            ->title('Peserta diterima!')
                            ->body($record->nama_lengkap . ' berhasil diterima sebagai peserta aktif.')
                            ->send();
                    })
                    ->visible(fn ($record) => $record->status === PesertaCalon::STATUS_PENDAFTAR),
                    
                Actions\Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pendaftar?')
                    ->modalDescription('Apakah Anda yakin ingin menolak pendaftar ini?')
                    ->action(function (PesertaCalon $record) {
                        $record->update(['status' => PesertaCalon::STATUS_DITOLAK]);
                        
                        Notification::make()
                            ->warning()
                            ->title('Pendaftar ditolak')
                            ->body($record->nama_lengkap . ' telah ditolak.')
                            ->send();
                    })
                    ->visible(fn ($record) => $record->status === PesertaCalon::STATUS_PENDAFTAR),
            ])
            ->bulkActions([
                Actions\BulkAction::make('terima_bulk')
                    ->label('Terima sebagai Peserta Aktif')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pendaftar Terpilih?')
                    ->modalDescription('Apakah Anda yakin ingin menerima semua pendaftar yang dipilih?')
                    ->action(function (Collection $records) {
                        $count = $records->count();
                        $records->each->update(['status' => PesertaCalon::STATUS_PESERTA]);
                        
                        Notification::make()
                            ->success()
                            ->title('Berhasil!')
                            ->body("{$count} pendaftar berhasil diterima sebagai peserta aktif.")
                            ->send();
                    }),
                    
                Actions\BulkAction::make('tolak_bulk')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pendaftar Terpilih?')
                    ->modalDescription('Apakah Anda yakin ingin menolak semua pendaftar yang dipilih?')
                    ->action(function (Collection $records) {
                        $count = $records->count();
                        $records->each->update(['status' => PesertaCalon::STATUS_DITOLAK]);
                        
                        Notification::make()
                            ->warning()
                            ->title('Berhasil!')
                            ->body("{$count} pendaftar ditolak.")
                            ->send();
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            PenilaiansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesertaCalons::route('/'),
        ];
    }
}
