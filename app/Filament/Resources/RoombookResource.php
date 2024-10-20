<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoombookResource\Pages;
use App\Filament\Resources\RoombookResource\RelationManagers;
use App\Models\Cinema;
use App\Models\Room;
use App\Models\Roombook;
use App\Models\TimeSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoombookResource extends Resource
{
    protected static ?string $model = Roombook::class;

    protected static ?string $label = 'Room for Booking';
    protected static ?string $navigationLabel = 'Room for Booking';
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Cinema Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('room_id')
                //     ->relationship('room', 'name')
                //     ->required(),
                Forms\Components\Select::make('time_session_id')
                    ->label('Time Session')
                    ->options(TimeSession::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('day')
                    ->label('Day')
                    ->options([
                        1 => 'Day 1',
                        2 => 'Day 2',
                        3 => 'Day 3',
                        4 => 'Day 4',
                        5 => 'Day 5',
                        6 => 'Day 6',
                        7 => 'Day 7',
                    ]),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room.cinema.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('room.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('timeSession')
                    ->label('Session')
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        $timeSession = $record->timeSession;
                        return $timeSession->name . ' (' . $timeSession->start_time . ' - ' . $timeSession->end_time . ')';
                    }),
                Tables\Columns\TextColumn::make('day')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('cinema')
                    ->label('Cinema')
                    // ->options(function (Cinema $cinema) {
                    //     return Cinema::all()->pluck('name', 'id');
                    // })

                    ->options(Cinema::all()->pluck('name', 'id'))
                    ->query(function (Builder $query, array $data): Builder {
                        if ($data['value'] != null) {
                            return $query->whereHas('room.cinema', function (Builder $query) use ($data) {
                                $query->where('id', $data);
                            });
                        }

                        return $query;
                    })
                    ->default(
                        Cinema::first() ? Cinema::first()->id : 0
                    )
                    ->searchable()
                    ->preload(),
                SelectFilter::make('day')
                    ->label('Day')
                    ->options([
                        1 => 'Day 1',
                        2 => 'Day 2',
                        3 => 'Day 3',
                        4 => 'Day 4',
                        5 => 'Day 5',
                        6 => 'Day 6',
                        7 => 'Day 7',
                    ])
                    ->preload(),
                // SelectFilter::make('room_id')
                //     ->label('Room')
                //     ->options([
                //         '1' => 'Draft',
                //         '2' => 'Reviewing',
                //         '3' => 'Published',
                //     ]),
                SelectFilter::make('room')
                    ->label('Room')
                    ->options(function (Builder $query) {
                        $cinemaId = request()->get('tableFilters')['cinema']['value'] ?? null;
                        dump($cinemaId);
                        if ($cinemaId) {
                            return Room::where('cinema_id', $cinemaId)->pluck('name', 'id');
                        }
                        return Room::all()->pluck('name', 'id');
                        // return Room::where('cinema_id', $cinemaId)->pluck('name', 'id');
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        if ($data['value'] != null) {
                            return $query->where('room_id', $data);
                        }
                        return $query;
                    })
                // ->live(),
            ], layout: FiltersLayout::AboveContent)
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
            'index' => Pages\ListRoombooks::route('/'),
            'create' => Pages\CreateRoombook::route('/create'),
            'edit' => Pages\EditRoombook::route('/{record}/edit'),
        ];
    }
}
