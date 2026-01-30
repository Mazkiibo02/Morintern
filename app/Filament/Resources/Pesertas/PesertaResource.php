<?php

namespace App\Filament\Resources\Pesertas;

use App\Filament\Resources\Pesertas\Pages\ManagePesertas;
use App\Models\PesertaCalon;
use App\Models\Spesialisasi;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PesertaResource extends Resource
{
    protected static ?string $model = PesertaCalon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $navigationLabel = 'Peserta Aktif';
    protected static ?string $modelLabel = 'Peserta Aktif';
    protected static ?string $pluralModelLabel = 'Peserta Aktif';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Peserta';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->peserta();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                    ->relationship('spesialisasi', 'nama_spesialisasi')
                    ->searchable()
                    ->preload(),
                    
                TextInput::make('kelompok_id')
                    ->label('Kelompok ID')
                    ->numeric(),
                    
                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->native(false),
                    
                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->native(false)
                    ->after('tanggal_mulai'),
                    
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'peserta' => 'Peserta',
                        'pendaftar' => 'Pendaftar',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('peserta')
                    ->required(),
                    
                Select::make('penilaian_status')
                    ->label('Status Penilaian')
                    ->options([
                        PesertaCalon::PENILAIAN_PENDING => 'Dalam Evaluasi',
                        PesertaCalon::PENILAIAN_LULUS => 'Lulus',
                        PesertaCalon::PENILAIAN_TIDAK_LULUS => 'Tidak Lulus',
                    ]),
                    
                Textarea::make('kritik_saran')
                    ->label('Kritik / Saran')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_lengkap')
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('no_telp')
                    ->label('No. Telepon')
                    ->searchable(),
                    
                TextColumn::make('spesialisasi.nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('kelompok_id')
                    ->label('Kelompok')
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Kelompok ' . $state : '-';
                    })
                    ->sortable(),
                    
                TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y')
                    ->sortable(),
                    
                TextColumn::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date('d M Y')
                    ->sortable(),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color('success'),
                    
                TextColumn::make('penilaian_status')
                    ->label('Status Penilaian')
                    ->badge()
                    ->color(function ($state) {
                        return $state ? 'success' : 'warning';
                    })
                    ->formatStateUsing(function ($state) {
                        return $state ? PesertaCalon::getPenilaianStatusLabelFor($state) : 'Belum Dinilai';
                    }),
                    
                TextColumn::make('created_at')
                    ->label('Terdaftar Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                TextColumn::make('updated_at')
                    ->dateTime('d M Y H:i')
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
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePesertas::route('/'),
        ];
    }
}
