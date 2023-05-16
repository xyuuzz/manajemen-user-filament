<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevenueResource\Pages;
use App\Filament\Resources\RevenueResource\RelationManagers;
use App\Models\Revenue;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RevenueResource extends Resource
{
    protected static ?string $model = Revenue::class;

    protected static ?string $title = 'Pencatatan Revenue Perusahaan';
    protected static ?string $navigationLabel = 'Pencatatan Revenue';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')->required()->label("Total Revenue"),
                Forms\Components\TextInput::make('description')->required()->label("Deskripsi Revenue"),
                Forms\Components\TextInput::make('origin')->required()->label("Asal Revenue"),
                Forms\Components\TextInput::make('payment_method')->required()->label("Metode Pembayaran"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("amount")->searchable()->sortable()->label("Total Revenue"),
                Tables\Columns\TextColumn::make("description")->searchable()->sortable()->label("Deskripsi Revenue"),
                Tables\Columns\TextColumn::make("origin")->searchable()->sortable()->label("Asal Revenue"),
                Tables\Columns\TextColumn::make("payment_method")->searchable()->sortable()->label("Metode Pembayaran"),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRevenues::route('/'),
            'create' => Pages\CreateRevenue::route('/create'),
            'edit' => Pages\EditRevenue::route('/{record}/edit'),
        ];
    }
}
