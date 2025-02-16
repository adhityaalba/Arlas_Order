<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubKerahResource\Pages;
use App\Filament\Resources\SubKerahResource\RelationManagers;
use App\Models\SubKerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubKerahResource extends Resource
{
    protected static ?string $model = SubKerah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori_id')
                    ->relationship('kerah', 'kategori')
                    ->required(),
                Forms\Components\Select::make('jenis_kerah')
                ->options([
                    ''
                ])
                    ->required(),
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_kerah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSubKerahs::route('/'),
            'create' => Pages\CreateSubKerah::route('/create'),
            'view' => Pages\ViewSubKerah::route('/{record}'),
            'edit' => Pages\EditSubKerah::route('/{record}/edit'),
        ];
    }
}
