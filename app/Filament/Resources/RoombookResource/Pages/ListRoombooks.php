<?php

namespace App\Filament\Resources\RoombookResource\Pages;

use App\Filament\Resources\RoombookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoombooks extends ListRecords
{
    protected static string $resource = RoombookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
