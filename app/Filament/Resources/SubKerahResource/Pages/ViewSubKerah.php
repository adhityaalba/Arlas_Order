<?php

namespace App\Filament\Resources\SubKerahResource\Pages;

use App\Filament\Resources\SubKerahResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubKerah extends ViewRecord
{
    protected static string $resource = SubKerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
