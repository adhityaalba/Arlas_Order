<?php

namespace App\Filament\Resources\SubKerahResource\Pages;

use App\Filament\Resources\SubKerahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubKerah extends EditRecord
{
    protected static string $resource = SubKerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
