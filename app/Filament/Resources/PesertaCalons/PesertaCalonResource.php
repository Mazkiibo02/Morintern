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

class PesertaCalonResource extends Resource
{
    protected static ?string $model = PesertaCalon::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Peserta Calon';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Peserta';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp')
                    ->tel()
                    ->maxLength(20),
                Forms\Components\Select::make('spesialisasi_id')
                    ->relationship('spesialisasi', 'nama_spesialisasi')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('universitas_id')
                    ->label('Universitas')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jurusan_id')
                    ->label('Jurusan')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_mulai'),
                Forms\Components\DatePicker::make('tanggal_selesai'),
                Forms\Components\TextInput::make('github')->url(),
                Forms\Components\TextInput::make('linkedin')->url(),
                Forms\Components\FileUpload::make('cv')
                    ->directory('cv')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(5120),
                Forms\Components\FileUpload::make('surat')
                    ->directory('surat')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                    ->maxSize(5120),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'diterima'  => 'Diterima',
                        'ditolak'   => 'Ditolak',
                    ])
                    ->default('pending')
                    ->required(),
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
                Tables\Columns\TextColumn::make('spesialisasi.nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'   => 'warning',
                        'diterima'  => 'success',
                        'ditolak'   => 'danger',
                        default     => 'gray',
                    }),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending'   => 'Pending',
                        'diterima'  => 'Diterima',
                        'ditolak'   => 'Ditolak',
                    ]),
            ])
            ->actions([
                Actions\ViewAction::make(),
                Actions\EditAction::make(),
                Actions\Action::make('penilaian')
                    ->label('Beri Penilaian')
                    ->icon('heroicon-o-star')
                    ->color('warning')
                    ->form([
                        Forms\Components\Textarea::make('kritik_saran')
                            ->label('Kritik & Saran')
                            ->rows(5),
                        Forms\Components\FileUpload::make('file_penilaian')
                            ->label('File Penilaian')
                            ->directory('penilaian')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                            ->maxSize(10240),
                    ])
                    ->action(function (PesertaCalon $record, array $data) {
                        $record->update([
                            'kritik_saran' => $data['kritik_saran'],
                            'file_penilaian' => $data['file_penilaian'] ?? $record->file_penilaian,
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Penilaian berhasil disimpan!')
                            ->send();
                    })
                    ->visible(fn ($record) => $record->status === 'diterima'),
            ])
            ->bulkActions([
                Actions\DeleteBulkAction::make(),
                Actions\BulkAction::make('terima')
                    ->label('Terima sebagai Peserta Aktif')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->update(['status' => 'diterima']))
                    ->after(fn () => Notification::make()->success()->title('Peserta diterima!')->send()),
                Actions\BulkAction::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->update(['status' => 'ditolak']))
                    ->after(fn () => Notification::make()->success()->title('Peserta ditolak.')->send()),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesertaCalons::route('/'),
        ];
    }
}
