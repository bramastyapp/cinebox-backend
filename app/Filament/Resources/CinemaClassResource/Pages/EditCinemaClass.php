<?php

namespace App\Filament\Resources\CinemaClassResource\Pages;

use App\Filament\Resources\CinemaClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCinemaClass extends EditRecord
{
    protected static string $resource = CinemaClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
