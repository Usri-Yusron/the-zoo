<?php

namespace App\Filament\Resources\HabitatResource\Pages;

use App\Filament\Resources\HabitatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHabitat extends EditRecord
{
    protected static string $resource = HabitatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
