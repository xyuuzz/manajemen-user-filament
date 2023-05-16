<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $title = 'Pencatatan Dokumen Perusahaan';
    protected static ?string $navigationLabel = 'Dokumen Perusahaan';

    protected static ?string $navigationIcon  = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label("Nama Dokumen"),
                Forms\Components\TextInput::make('description')->required()->label("Abstraksi Dokumen"),
                Forms\Components\TextInput::make('type')->required()->label("Tipe Dokumen"),
                Forms\Components\TextInput::make('purpose')->required()->label("Tujuan dibuatnya Dokumen"),
                Forms\Components\FileUpload::make('file')->required()->label("File Dokumen"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->searchable()->sortable()->label("Nama Dokumen"),
                Tables\Columns\TextColumn::make("description")->searchable()->sortable()->label("Abstraksi Dokumen"),
                Tables\Columns\TextColumn::make("purpose")->searchable()->sortable()->label("Tujuan dibuatnya dokumen"),
                Tables\Columns\TextColumn::make("file")->searchable()->sortable()->label("File Dokumen"),
                Tables\Columns\TextColumn::make("type")->searchable()->sortable()->label("Tipe Dokumen"),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
