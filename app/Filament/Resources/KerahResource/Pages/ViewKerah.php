<?php

namespace App\Filament\Resources\KerahResource\Pages;

use App\Filament\Resources\KerahResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKerah extends ViewRecord
{
    protected static string $resource = KerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
