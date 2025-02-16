<?php

namespace App\Filament\Resources\KategoriUkuranResource\Pages;

use App\Filament\Resources\KategoriUkuranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriUkuran extends EditRecord
{
    protected static string $resource = KategoriUkuranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
