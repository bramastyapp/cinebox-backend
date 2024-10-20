<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CinemaClassResource\Pages;
use App\Filament\Resources\CinemaClassResource\RelationManagers;
use App\Models\CinemaClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CinemaClassResource extends Resource
{
    protected static ?string $model = CinemaClass::class;

    protected static ?string $navigationLabel = 'Classes';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Cinema Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('priority')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('priority')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCinemaClasses::route('/'),
            'create' => Pages\CreateCinemaClass::route('/create'),
            'edit' => Pages\EditCinemaClass::route('/{record}/edit'),
        ];
    }
}
