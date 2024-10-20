<?php

namespace App\Filament\Resources\TimeSessionResource\Pages;

use App\Filament\Resources\TimeSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimeSession extends EditRecord
{
    protected static string $resource = TimeSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
