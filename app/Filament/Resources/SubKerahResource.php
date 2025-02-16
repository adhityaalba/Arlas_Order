<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kerah;
use App\Models\SubKerah;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SubKerahResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubKerahResource\RelationManagers;

class SubKerahResource extends Resource
{
    protected static ?string $model = SubKerah::class;
    protected static ?string $navigationLabel = 'Sub Kerah';


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kerah_id') // Pilihan kategori
                    ->label('Kategori')
                    ->relationship('kerah', 'kategori')
                    ->reactive()
                    ->required(),

                Select::make('jenis_kerah') // Pilihan jenis kerah
                    ->label('Jenis Kerah')
                    ->options(fn(callable $get) => match ($get('kerah_id')) {
                        '1' => ['Round Neck' => 'Round Neck', 'Vneck Basic' =>  'Vneck Basic', 'Vneck Flat' => 'Vneck Flat', 'Vneck Stack' => 'Vneck Stack', 'Vneck Basic List' => 'Vneck Basic List', 'Vneck Flat List' => 'Vneck Flat List', 'Vneck Round' => 'Vneck Round', 'Vneck Round List' => 'Vneck Round List', 'Vneck Strip' => 'Vneck Strip'], // Untuk Kategori A
                        '2' => ['Vneck Polo' => 'Vneck Polo', 'Vneck Polo Insert' => 'Vneck Polo Insert', 'Vneck Flat Insert' => 'Vneck Flat Insert'], // Untuk Kategori B
                        '3' => ['Vneck Polo Laces' => 'Vneck Polo Laces', 'Polo Shanghai' => 'Polo Shanghai', 'Collar Polo' => 'Collar Polo'], // Untuk Kategori C
                        default => [],
                    })
                    ->reactive()
                    ->unique()
                    ->required(),

                Forms\Components\Select::make('harga')
                    ->options(fn(callable $get) => match ($get('kerah_id')) {
                        '1' => [0 => 0],
                        '2' => [10000 => 10000],
                        '3' => [15000 => 15000],
                        default => [],
                    })
                    ->reactive()
                    ->dehydrated()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kerah.kategori') // Tampilkan nama kategori
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenis_kerah')
                    ->label('Jenis Kerah')
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
            ->filters([])
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
        return [];
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
