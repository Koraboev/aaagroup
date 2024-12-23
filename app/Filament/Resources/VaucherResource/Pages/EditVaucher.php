<?php

namespace App\Filament\Resources\VaucherResource\Pages;

use App\Filament\Resources\VaucherResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVaucher extends EditRecord
{
    protected static string $resource = VaucherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
