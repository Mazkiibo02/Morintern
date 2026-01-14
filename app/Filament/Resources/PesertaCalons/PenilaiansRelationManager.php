<?php

namespace App\Filament\Resources\PesertaCalons;

use App\Models\Penilaian;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class PenilaiansRelationManager extends RelationManager
{
    protected static string $relationship = 'penilaians';

    protected static ?string $recordTitleAttribute = 'kritik_saran';

    public function isVisible(): bool
    {
        return $this->getOwnerRecord()->status === 'peserta';
    }

    public function schema(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Textarea::make('kritik_saran')
                    ->label('Kritik & Saran')
                    ->required()
                    ->maxLength(65535),

                Forms\Components\FileUpload::make('file_path')
                    ->label('File Penilaian')
                    ->directory('penilaian')
                    ->disk('private')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                    ->maxSize(10240) // 10MB
                    ->downloadable()
                    ->openable()
                    ->deletable(false) // Prevent deletion from form, handle in actions
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $record = $this->getRecord();
        if ($record && isset($data['file_path']) && $record->file_path !== $data['file_path']) {
            // New file uploaded, delete old one
            if ($record->file_path) {
                Storage::disk('private')->delete($record->file_path);
            }
        }
        return $data;
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kritik_saran')
            ->columns([
                Tables\Columns\TextColumn::make('kritik_saran')
                    ->label('Kritik & Saran')
                    ->limit(50),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('File')
                    ->formatStateUsing(fn ($state) => $state ? 'Ada' : 'Tidak ada'),

                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Dibuat Oleh'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->visible(fn () => auth()->user()->hasAnyRole(['admin', 'mentor', 'hrd'])),
            ])
            ->actions([
                Tables\Actions\Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Penilaian $record) {
                        if (!$record->file_path) {
                            Notification::make()
                                ->warning()
                                ->title('File tidak ditemukan')
                                ->send();
                            return;
                        }

                        $path = Storage::disk('private')->path($record->file_path);
                        if (!Storage::disk('private')->exists($record->file_path)) {
                            Notification::make()
                                ->warning()
                                ->title('File tidak ditemukan')
                                ->send();
                            return;
                        }

                        return response()->download($path);
                    })
                    ->visible(fn (Penilaian $record) => $record->file_path !== null),

                Tables\Actions\EditAction::make()
                    ->visible(fn () => auth()->user()->hasAnyRole(['admin', 'mentor', 'hrd'])),

                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => auth()->user()->hasAnyRole(['admin', 'mentor', 'hrd']))
                    ->before(function (Penilaian $record) {
                        if ($record->file_path) {
                            Storage::disk('private')->delete($record->file_path);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()->hasAnyRole(['admin', 'mentor', 'hrd']))
                        ->before(function ($records) {
                            foreach ($records as $record) {
                                if ($record->file_path) {
                                    Storage::disk('private')->delete($record->file_path);
                                }
                            }
                        }),
                ]),
            ]);
    }

    public function isReadOnly(): bool
    {
        return !auth()->user()->hasAnyRole(['admin', 'mentor', 'hrd']);
    }
}