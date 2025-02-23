<?php

namespace App\Filament\Resources\ModelJerseyResource\Pages;

use App\Filament\Resources\ModelJerseyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModelJersey extends EditRecord
{
    protected static string $resource = ModelJerseyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
