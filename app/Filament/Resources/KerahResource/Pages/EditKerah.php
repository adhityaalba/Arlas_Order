<?php

namespace App\Filament\Resources\KerahResource\Pages;

use App\Filament\Resources\KerahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKerah extends EditRecord
{
    protected static string $resource = KerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
