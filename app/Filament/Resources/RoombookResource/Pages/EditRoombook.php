<?php

namespace App\Filament\Resources\RoombookResource\Pages;

use App\Filament\Resources\RoombookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoombook extends EditRecord
{
    protected static string $resource = RoombookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
