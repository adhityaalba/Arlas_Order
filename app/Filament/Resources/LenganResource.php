<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LenganResource\Pages;
use App\Models\Lengan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LenganResource extends Resource
{
    protected static ?string $model = Lengan::class;
    protected static ?string $navigationLabel = 'Lengan';


    // Icon untuk menu
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama_lengan')
                    ->label('Nama Lengan')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengan')
                    ->label('Nama Lengan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLengans::route('/'),
            'create' => Pages\CreateLengan::route('/create'),
            'edit' => Pages\EditLengan::route('/{record}/edit'),
        ];
    }
}
