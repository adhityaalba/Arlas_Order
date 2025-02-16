<?php

namespace App\Filament\Resources\KerahResource\Pages;

use App\Filament\Resources\KerahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKerahs extends ListRecords
{
    protected static string $resource = KerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
