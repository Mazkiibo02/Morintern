<?php

namespace App\Filament\Resources\PesertaCalons;

use App\Filament\Resources\PesertaCalons\Pages\ManagePesertaCalons;
use App\Models\PesertaCalon;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;

class PesertaCalonResource extends Resource
{
    protected static ?string $model = PesertaCalon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password(),
                TextInput::make('no_telp')
                    ->tel(),
                TextInput::make('universitas_id'),
                TextInput::make('jurusan_id'),
                TextInput::make('spesialisasi_id')
                    ->numeric(),
                TextInput::make('kelompok_id')
                    ->numeric(),
                TextInput::make('ketua_id')
                    ->numeric(),
                TextInput::make('perusahaan_id')
                    ->numeric(),
                DatePicker::make('tanggal_mulai'),
                DatePicker::make('tanggal_selesai'),
                TextInput::make('github'),
                TextInput::make('linkedin'),
                TextInput::make('cv'),
                TextInput::make('surat'),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'applied' => 'Applied',
            'accepted' => 'Accepted',
            'rejected' => 'Rejected',
        ])
                    ->default('pending')
                    ->required(),
                TextInput::make('google_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_lengkap')
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('no_telp')
                    ->searchable(),
                TextColumn::make('universitas_id')
                    ->searchable(),
                TextColumn::make('jurusan_id')
                    ->searchable(),
                TextColumn::make('spesialisasi_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kelompok_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ketua_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('perusahaan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                TextColumn::make('github')
                    ->searchable(),
                TextColumn::make('linkedin')
                    ->searchable(),
                TextColumn::make('cv')
                    ->searchable(),
                TextColumn::make('surat')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('google_id')
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
            'index' => ManagePesertaCalons::route('/'),
        ];
    }
}
