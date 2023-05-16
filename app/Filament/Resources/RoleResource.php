<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Spatie\Permission\Models\Role;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;
    protected static ?string $navigationLabel = "Manajemen Role";

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Pengaturan MultiUser';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                schema form for role table
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\CheckboxList::make("role_permission")->relationship("permissions", "name")->getOptionLabelFromRecordUsing(fn(Model $record) => ucwords(str_replace("_", " ", $record->name)))->columns(3)->bulkToggleable()->label("Role Permission"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label("Nama Role"),
                Tables\Columns\TagsColumn::make('permissions.name')->searchable()->sortable()->label("Permission"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
//            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
