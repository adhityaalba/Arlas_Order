<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriUkuranResource\Pages;
use App\Filament\Resources\KategoriUkuranResource\RelationManagers;
use App\Models\Kategori_ukuran;
use App\Models\KategoriUkuran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriUkuranResource extends Resource
{
    protected static ?string $model = Kategori_ukuran::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag'; // Icon untuk menu
    protected static ?string $navigationGroup = 'Atribut'; // Grup menu
    protected static ?string $navigationLabel = 'Kategori';
    protected static ?string $label = 'Kategori';
    protected static ?string $pluralLabel = 'Kategori Ukuran';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriUkurans::route('/'),
            'create' => Pages\CreateKategoriUkuran::route('/create'),
            'edit' => Pages\EditKategoriUkuran::route('/{record}/edit'),
        ];
    }
}
