<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardingHouseResource\Pages;
use App\Filament\Resources\BoardingHouseResource\RelationManagers;
use App\Models\BoardingHouse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Tabs;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Repeater;

class BoardingHouseResource extends Resource
{
    protected static ?string $model = BoardingHouse::class;

    protected static ?string $navigationGroup = 'Boarding Management';
    protected static ?string $navigationIcon = 'heroicon-o-building-library';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Informasi Umum')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('thumbnail')
                                    ->required()
                                    ->columnSpan(2),
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(100)
                                    ->debounce(500) 
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(table: 'boarding_houses', column: 'slug')
                                    ->dehydrated(), // Pastikan slug dikirim ke backend
                                Select::make('city_id')
                                    ->relationship('city', 'name')
                                    ->required(),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required(),
                                RichEditor::make('description')
                                    ->required(),
                                TextInput::make('price')
                                    ->numeric()
                                    ->required()
                                    ->prefix('IDR'),
                                TextInput::make('address')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Bonus')
                            ->schema([
                                Repeater::make('bonuses')
                                    ->relationship('bonuses')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory('bonuses')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('name')
                                            ->required(),
                                        TextInput::make('description')
                                            ->required(),                                        
                                    ])
                                    ->columns(2),
                            ]),
                            Tabs\Tab::make('Kamar')
                                ->schema([
                                    Repeater::make('room')
                                        ->relationship('room')
                                        ->schema([
                                            TextInput::make('name')->required(),
                                            TextInput::make('room_type')->required(),
                                            TextInput::make('square_feet')->required()->numeric(),
                                            TextInput::make('capacity')->required()->numeric(),
                                            TextInput::make('price_per_month')->required(),
                                            Toggle::make('is_available')->required(),
                            
                                            // Pindahkan roomImages ke dalam Repeater room
                                            Repeater::make('roomImages')
                                                ->relationship('roomImages')
                                                ->schema([
                                                    FileUpload::make('image')
                                                        ->image()
                                                        ->directory('roomImages')
                                                        ->required()
                                                        ->columnSpan(2),
                                                ])
                                                ->columns(2),
                                        ])
                                        ->columns(2),
                                ]),
                    ])
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail'),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('city.name')
                    ->sortable(),
                TextColumn::make('category.name'),
                TextColumn::make('address')->wrap(),
                TextColumn::make('price')->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBoardingHouses::route('/'),
            'create' => Pages\CreateBoardingHouse::route('/create'),
            'edit' => Pages\EditBoardingHouse::route('/{record}/edit'),
        ];
    }
}
