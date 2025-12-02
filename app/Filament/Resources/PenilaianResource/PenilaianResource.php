<?php

namespace App\Filament\Resources\Penilaians;

use App\Filament\Resources\Penilaians\Pages\CreatePenilaian;
use App\Filament\Resources\Penilaians\Pages\EditPenilaian;
use App\Filament\Resources\Penilaians\Pages\ListPenilaians;
use App\Filament\Resources\Penilaians\Pages\ViewPenilaian;
use App\Filament\Resources\Penilaians\Schemas\PenilaianForm;
use App\Filament\Resources\Penilaians\Schemas\PenilaianInfolist;
use App\Filament\Resources\Penilaians\Tables\PenilaiansTable;
use App\Models\Penilaian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenilaianResource extends Resource
{
    protected static ?string $model = Penilaian::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return PenilaianForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PenilaianInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenilaiansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenilaians::route('/'),
            'create' => CreatePenilaian::route('/create'),
            'view' => ViewPenilaian::route('/{record}'),
            'edit' => EditPenilaian::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
