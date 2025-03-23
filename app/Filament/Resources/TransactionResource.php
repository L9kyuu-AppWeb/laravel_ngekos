<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Str;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationGroup = 'Boarding Management';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->label('Transaction Code')
                    ->default(Str::upper(Str::random(10)))
                    ->unique()
                    ->readOnly(),
                Select::make('boarding_house_id')
                    ->label('Boarding House')
                    ->relationship('boardingHouse', 'name')
                    ->required(),
                Select::make('room_id')
                    ->label('Room')
                    ->relationship('room', 'name')
                    ->required(),
                TextInput::make('name')
                    ->label('Customer Name')
                    ->required()
                    ->maxLength(100),
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(100),
                TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->tel()
                    ->required()
                    ->maxLength(20),
                Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'bank_transfer' => 'Bank Transfer',
                        'credit_card' => 'Credit Card',
                        'ewallet' => 'E-Wallet',
                    ])
                    ->required(),
                Select::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                    ])
                    ->default('pending')
                    ->required(),
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),
                TextInput::make('duration')
                    ->label('Duration (months)')
                    ->numeric()
                    ->required(),
                TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                Hidden::make('transaction_date')
                    ->default(now()),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->sortable(),
                TextColumn::make('boardingHouse.name')->sortable(),
                TextColumn::make('room.name')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('payment_method')->sortable(),
                TextColumn::make('payment_status')->sortable()->badge(),
                TextColumn::make('total_amount')->sortable()->money('IDR'),
                TextColumn::make('transaction_date')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                    ]),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
