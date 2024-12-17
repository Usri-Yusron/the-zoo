<?php

namespace App\Filament\Resources\HabitatResource\Pages;

use App\Filament\Resources\HabitatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHabitats extends ListRecords
{
    protected static string $resource = HabitatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
