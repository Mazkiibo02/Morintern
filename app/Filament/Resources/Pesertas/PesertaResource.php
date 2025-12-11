<?php

namespace App\Filament\Resources\Pesertas;

use App\Filament\Resources\Pesertas\Pages\ManagePesertas;
use App\Models\Peserta;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PesertaResource extends Resource
{
    protected static ?string $model = Peserta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Peserta';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Peserta';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('status')
                    ->options(['peserta' => 'Peserta', 'selesai' => 'Selesai', 'dropout' => 'Dropout'])
                    ->default('peserta')
                    ->required(),
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('google_id'),
                TextInput::make('no_telp')
                    ->tel(),
                TextInput::make('ketua_id')
                    ->numeric(),
                TextInput::make('perusahaan_id')
                    ->numeric(),
                DateTimePicker::make('tanggal_daftar'),
                TextInput::make('status_id')
                    ->numeric(),
                TextInput::make('kelompok_id')
                    ->numeric(),
                TextInput::make('universitas'),
                TextInput::make('jurusan'),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('github'),
                TextInput::make('linkedin'),
                TextInput::make('cv'),
                TextInput::make('surat'),
                Textarea::make('kritik_saran')
                    ->columnSpanFull(),
                TextInput::make('file_penilaian'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_lengkap')
            ->columns([
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('google_id')
                    ->searchable(),
                TextColumn::make('no_telp')
                    ->searchable(),
                TextColumn::make('ketua_id')
                    ->numeric()
                    ->sortable()
                    ->sortable(),
                TextColumn::make('perusahaan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal_daftar')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kelompok_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('universitas')
                    ->searchable(),
                TextColumn::make('jurusan')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('github')
                    ->searchable(),
                TextColumn::make('linkedin')
                    ->searchable(),
                TextColumn::make('cv')
                    ->searchable(),
                TextColumn::make('surat')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('file_penilaian')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePesertas::route('/'),
        ];
    }
}
