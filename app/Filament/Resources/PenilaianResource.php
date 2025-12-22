<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianResource\Pages\CreatePenilaian;
use App\Filament\Resources\PenilaianResource\Pages\EditPenilaian;
use App\Filament\Resources\PenilaianResource\Pages\ListPenilaians;
use App\Filament\Resources\PenilaianResource\Pages\ViewPeserta;
use App\Filament\Resources\PenilaianResource\Schemas\PesertaForm;
use App\Filament\Resources\PenilaianResource\Schemas\PesertaInfolist;
use App\Filament\Resources\PenilaianResource\Tables\PesertasTable;
use App\Models\Peserta;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
class PenilaianResource extends Resource
{
    protected static ?string $model = Peserta::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-star';

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    protected static UnitEnum|string|null $navigationGroup = 'Manajemen Peserta';

    protected static ?int $navigationSort = 3;

    public static function getLabel(): string
    {
        return 'Penilaian';
    }

    public static function getPluralLabel(): string
    {
        return 'Penilaian';
    }

    public static function form(Schema $schema): Schema
    {
        return PesertaForm::create($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PesertaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PesertasTable::configure($table);
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
            'view' => ViewPeserta::route('/{record}'),
            'create' => CreatePenilaian::route('/create'),
            'edit' => EditPenilaian::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->whereHas('status', function ($query) {
                $query->where('nama_status', 'like', '%aktif%');
            });
    }
}
