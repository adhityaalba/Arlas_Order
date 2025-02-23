<?php

namespace App\Filament\Resources\ModelJerseyResource\Pages;

use App\Filament\Resources\ModelJerseyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewModelJersey extends ViewRecord
{
    protected static string $resource = ModelJerseyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
