<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Hewan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\HewanResource\Pages;

class HewanResource extends Resource
{
    protected static ?string $model = Hewan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\select::make('habitat_id')
                    // berdasarkan relationship (habitat berdasarkan nama di function model hewan)
                    ->relationship('habitat', 'nama')
                    ->required(),
                Forms\Components\select::make('makanan_id')
                    // berdasarkan relationship
                    ->relationship('makanan', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('tentang')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('detail_makanan')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('panjang')
                    ->placeholder('in cm')
                    ->numeric(),
                Forms\Components\TextInput::make('berat')
                    ->placeholder('in kg')
                    ->numeric(),
                Forms\Components\TextInput::make('tinggi')
                    ->placeholder('in cm')
                    ->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('tentang')
                    ->limit(50)
                    ->searchable(),
                // manggil berdasarkan nama
                Tables\Columns\TextColumn::make('habitat.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('makanan.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('detail_makanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('panjang')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state . ' cm'),
                Tables\Columns\TextColumn::make('berat')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state . ' kg'),
                Tables\Columns\TextColumn::make('tinggi')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state . ' cm'),
                Tables\Columns\TextColumn::make('created_at')
                    // agar lebih mudah dibaca
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('makanan.nama')
                ->options([
                    'Omnivora' => 'Omnivora',
                    'Herbivora' => 'Herbivora',
                    'Karnivora' => 'Karnivora',
                ]),
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
            'index' => Pages\ListHewans::route('/'),
            'create' => Pages\CreateHewan::route('/create'),
            'edit' => Pages\EditHewan::route('/{record}/edit'),
        ];
    }
}
