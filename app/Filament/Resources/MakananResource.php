<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Makanan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Resources\MakananResource\Pages;

class MakananResource extends Resource
{
    protected static ?string $model = Makanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('detail')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable(),
                    // ->searchable(),
                Tables\Columns\TextColumn::make('detail')->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    // agar lebih mudah dibaca
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMakanans::route('/'),
            'create' => Pages\CreateMakanan::route('/create'),
            'edit' => Pages\EditMakanan::route('/{record}/edit'),
        ];
    }
}
