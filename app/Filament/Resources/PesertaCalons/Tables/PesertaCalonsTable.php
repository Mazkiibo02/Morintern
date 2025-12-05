<?php

namespace App\Filament\Resources\PesertaCalons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class PesertaCalonsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('no_telp')
                    ->label('No Telepon')
                    ->searchable(),

                TextColumn::make('spesialisasi.nama_spesialisasi')
                    ->label('Spesialisasi')
                    ->badge()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pendaftar',
                        'primary' => 'mendaftar',
                        'success' => 'diterima',
                        'danger'  => 'ditolak',
                    ])
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->date()
                    ->sortable(),
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),

                    BulkAction::make('accept')
                        ->label('Terima Peserta')
                        ->color('success')
                        ->icon('heroicon-o-check')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update([
                            'status' => 'diterima'
                        ]))
                        ->after(fn () => Notification::make()->title('Perubahan status berhasil')->success()->send()),

                    BulkAction::make('reject')
                        ->label('Tolak Peserta')
                        ->color('danger')
                        ->icon('heroicon-o-x-mark')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update([
                            'status' => 'ditolak'
                        ]))
                        ->after(fn () => Notification::make()->title('Perubahan status berhasil')->success()->send()),
                ])
            ]);
    }
}


