<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UkuranResource\Pages;
use App\Models\Kategori_ukuran;
use App\Models\Ukuran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UkuranResource extends Resource
{
    protected static ?string $model = Ukuran::class;

    // Icon untuk menu
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    // Grup menu
    protected static ?string $navigationGroup = 'Atribut';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori_ukuran_id')
                    ->label('Kategori Ukuran')
                    ->options(Kategori_ukuran::pluck('nama_kategori', 'id'))
                    ->required()
                    ->searchable(),


                Forms\Components\Select::make('nama_ukuran')
                    ->label('Nama Ukuran')
                    ->options([
                        'S' => "S",
                        'M' => "M",
                        'L' => "L",
                        'XL' => "XL",
                    ])
                    ->required()
                    ->unique(ignoreRecord: true, table: 'ukuran', column: 'nama_ukuran', modifyRuleUsing: function ($rule, callable $get) {
                        return $rule->where('kategori_ukuran_id', $get('kategori_ukuran_id'));
                    }),
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
                Tables\Columns\TextColumn::make('kategoriUkuran.nama_kategori')
                    ->label('Kategori Ukuran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ukuran')
                    ->label('Nama Ukuran')
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
            'index' => Pages\ListUkurans::route('/'),
            'create' => Pages\CreateUkuran::route('/create'),
            'edit' => Pages\EditUkuran::route('/{record}/edit'),
        ];
    }
}
