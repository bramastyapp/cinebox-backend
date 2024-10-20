<?php

namespace App\Filament\Resources\CinemaClassResource\Pages;

use App\Filament\Resources\CinemaClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCinemaClasses extends ListRecords
{
    protected static string $resource = CinemaClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
