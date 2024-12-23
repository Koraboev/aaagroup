<?php

namespace App\Filament\Resources\VaucherResource\Pages;

use App\Filament\Resources\VaucherResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVauchers extends ListRecords
{
    protected static string $resource = VaucherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
