<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Pengaturan MultiUser';
    protected static ?string $title = 'Manajemen Pengguna';
    protected static ?string $navigationLabel = 'Manajemen Pengguna';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")->required()->label("Nama"),
                Forms\Components\TextInput::make("email")->required()->label("Email"),
                Forms\Components\TextInput::make("password")->dehydrateStateUsing(fn ($state) => Hash::make(filled($state)))->dehydrated(fn ($state) => filled($state))->label("Password Baru")->required(fn (Page $livewire) => ($livewire instanceof Pages\CreateUser))->password()->minLength(3),
                Forms\Components\TextInput::make("password_confirmation")->label("Konfirmasi Password Baru")->dehydrateStateUsing(fn ($state) => Hash::make(filled($state)))->dehydrated(fn ($state) => filled($state))->password()->minLength(3)->same("password")->required(fn (Page $livewire) => ($livewire instanceof Pages\CreateUser)),
                Forms\Components\Select::make("roles")->multiple()->relationship("roles", "name")->label("Role Pengguna")->columns(3)->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->label("Nama"),
                Tables\Columns\TextColumn::make("email")->label("Email"),
                Tables\Columns\TagsColumn::make("roles.name")->label("Role Pengguna"),
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

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
//            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
