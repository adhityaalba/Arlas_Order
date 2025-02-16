<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Material;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\MaterialResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MaterialResource\RelationManagers;
use App\Filament\Resources\MaterialResource\Pages\EditMaterial;
use App\Filament\Resources\MaterialResource\Pages\ListMaterials;
use App\Filament\Resources\MaterialResource\Pages\CreateMaterial;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;
    protected static ?string $navigationLabel = 'Bahan';
    protected static ?string $label = 'Bahan';
    protected static ?string $pluralLabel = 'Bahan';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Bahan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('price')
                    ->label('Harga') // Harga bahan
                    ->numeric()
                    ->required()
                    ->prefix('Rp '),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Bahan')
                    ->searchable(), // Kolom nama bahan bisa dicari

                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR'), // Format mata uang Rupiah
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
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
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
