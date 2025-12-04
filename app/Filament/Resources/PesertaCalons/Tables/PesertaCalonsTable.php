<?php

namespace App\Filament\Resources\PesertaCalons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

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
                        'warning' => 'pending',
                        'info'    => 'menunggu',
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
                        ->label('Terima Peserta Terpilih')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['status' => 'diterima']);
                            }
                        }),

                    BulkAction::make('reject')
                        ->label('Tolak Peserta Terpilih')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update(['status' => 'ditolak']);
                            }
                        }),
                ]),
            ]);
    }
}
