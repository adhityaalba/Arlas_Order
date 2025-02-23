<?php

namespace App\Filament\Resources\ModelJerseyResource\Pages;

use App\Filament\Resources\ModelJerseyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModelJerseys extends ListRecords
{
    protected static string $resource = ModelJerseyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
