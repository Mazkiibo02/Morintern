<?php

namespace App\Filament\Resources\PesertaCalons;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Filament\Resources\PesertaCalons\Pages\ManagePesertaCalons;
use App\Models\PesertaCalon;
use App\Models\Peserta;
use BackedEnum;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class PesertaCalonResource extends Resource
{
    protected static ?string $model = PesertaCalon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_lengkap')->required(),
                TextInput::make('email')->label('Email address')->email()->required(),
                TextInput::make('password')->password(),
                TextInput::make('no_telp')->tel(),
                TextInput::make('universitas_id'),
                TextInput::make('jurusan_id'),
                TextInput::make('spesialisasi_id')->numeric(),
                TextInput::make('kelompok_id')->numeric(),
                TextInput::make('ketua_id')->numeric(),
                TextInput::make('perusahaan_id')->numeric(),
                DatePicker::make('tanggal_mulai'),
                DatePicker::make('tanggal_selesai'),
                TextInput::make('github'),
                TextInput::make('linkedin'),
                TextInput::make('cv'),
                TextInput::make('surat'),
                Select::make('status')
                    ->options([
                        'pendaftar' => 'Pendaftar',
                        'mendaftar' => 'Mendaftar',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('pendaftar')
                    ->required(),
                TextInput::make('google_id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_lengkap')
            ->columns([
                TextColumn::make('nama_lengkap')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('no_telp')->searchable(),
                TextColumn::make('universitas_id')->searchable(),
                TextColumn::make('jurusan_id')->searchable(),
                TextColumn::make('spesialisasi_id')->numeric()->sortable(),
                TextColumn::make('kelompok_id')->numeric()->sortable(),
                TextColumn::make('ketua_id')->numeric()->sortable(),
                TextColumn::make('perusahaan_id')->numeric()->sortable(),
                TextColumn::make('tanggal_mulai')->date()->sortable(),
                TextColumn::make('tanggal_selesai')->date()->sortable(),
                TextColumn::make('github')->searchable(),
                TextColumn::make('linkedin')->searchable(),
                TextColumn::make('cv')->searchable(),
                TextColumn::make('surat')->searchable(),
                TextColumn::make('status')->badge(),
                TextColumn::make('google_id')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
    BulkActionGroup::make([
        \Filament\Actions\DeleteBulkAction::make(),

        BulkAction::make('approve')
            ->label('Terima & Promosikan Peserta')
            ->color('success')
            ->icon('heroicon-o-check-circle')
            ->requiresConfirmation()
            ->action(function (\Illuminate\Database\Eloquent\Collection $records) {
                foreach ($records as $calon) {
                    $data = [
                        'nama_lengkap' => $calon->nama_lengkap,
                        'email' => $calon->email,
                        'password' => $calon->password ?? bcrypt(Str::random(16)),
                        'no_telp' => $calon->no_telp,
                        'spesialisasi_id' => $calon->spesialisasi_id,
                        'kelompok_id' => $calon->kelompok_id,
                        'universitas' => $calon->universitas_id,
                        'jurusan' => $calon->jurusan_id,
                        'tanggal_mulai' => $calon->tanggal_mulai,
                        'tanggal_selesai' => $calon->tanggal_selesai,
                        'github' => $calon->github,
                        'linkedin' => $calon->linkedin,
                        'cv' => $calon->cv,
                        'surat' => $calon->surat,
                    ];

                    $existing = Peserta::where('email', $calon->email)->first();
                    if ($existing) {
                        $existing->update($data);
                    } else {
                        Peserta::create($data);
                    }

                    $calon->update(['status' => 'diterima']);
                }
            })
            ->after(function () {
                Notification::make()
                    ->success()
                    ->title('Peserta diterima & dipindahkan ke data peserta.')
                    ->send();
            }), // ← KOMA INI YANG HILANG!!!

        BulkAction::make('reject')
            ->label('Tolak Peserta Terpilih')
            ->color('danger')
            ->icon('heroicon-o-x-mark')
            ->requiresConfirmation()
            ->action(fn ($records) => $records->each->update(['status' => 'ditolak']))
            ->after(fn () => Notification::make()
                ->title('Peserta ditolak.')
                ->success()
                ->send()),
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