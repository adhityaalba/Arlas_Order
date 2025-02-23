<?php

namespace App\Filament\Resources\LenganResource\Pages;

use App\Filament\Resources\LenganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLengans extends ListRecords
{
    protected static string $resource = LenganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
