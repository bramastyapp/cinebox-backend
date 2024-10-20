<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeSessionResource\Pages;
use App\Filament\Resources\TimeSessionResource\RelationManagers;
use App\Models\TimeSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimeSessionResource extends Resource
{
    protected static ?string $model = TimeSession::class;

    protected static ?string $navigationLabel = 'Time Sessions';
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Cinema Management';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Grid::make(2) // Membuat grid dengan 2 kolom
                    ->schema([
                        Forms\Components\TextInput::make('start_time')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('end_time')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_time')
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
            'index' => Pages\ListTimeSessions::route('/'),
            'create' => Pages\CreateTimeSession::route('/create'),
            'edit' => Pages\EditTimeSession::route('/{record}/edit'),
        ];
    }
}
