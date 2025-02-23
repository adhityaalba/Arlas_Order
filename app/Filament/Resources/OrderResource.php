<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('order_number')
                    ->default(fn() => 'ORD-' . Str::random(8))
                    ->dehydrated(),

                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'nama')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Nama Customer')
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        if ($state) {
                            $customer = Customer::find($state);
                            $set('nama_customer', $customer->nama);
                        }
                    }),

                Forms\Components\Hidden::make('nama_customer'),

                Repeater::make('order_items')
                    ->schema([
                        Forms\Components\TextInput::make('nama_order')
                            ->required()
                            ->label('Nama Order'),

                        Forms\Components\Select::make('material_id')
                            ->relationship('material', 'name')
                            ->required()
                            ->label('Material'),

                        Forms\Components\Select::make('kerah_id')
                            ->relationship('kerah', 'kategori')
                            ->required()
                            ->label('Kerah'),

                        Forms\Components\Select::make('lengan_id')
                            ->relationship('lengan', 'nama_lengan')
                            ->required()
                            ->label('Lengan'),

                        Forms\Components\Select::make('model_jersey_id')
                            ->relationship('modelJersey', 'nama_model')
                            ->required()
                            ->label('Model Jersey'),

                        Forms\Components\Select::make('ukuran_id')
                            ->relationship(
                                'ukuran',
                                'nama_ukuran',
                                fn($query) => $query->with('kategoriUkuran')->select(['id', 'kategori_ukuran_id', 'nama_ukuran'])
                            )
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->kategoriUkuran->nama_kategori} - {$record->nama_ukuran}")
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Ukuran'),

                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->default(1)
                            ->required()
                            ->label('Jumlah'),
                    ])
                    ->createItemButtonLabel('Tambah Item')
                    ->defaultItems(1)
                    ->columns(4)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_customer')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Customer'),

                Tables\Columns\TextColumn::make('nama_order')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Order'),

                Tables\Columns\TextColumn::make('material.name')
                    ->sortable()
                    ->searchable()
                    ->label('Material'),

                Tables\Columns\TextColumn::make('kerah.nama')
                    ->sortable()
                    ->searchable()
                    ->label('Kerah'),

                Tables\Columns\TextColumn::make('lengan.nama')
                    ->sortable()
                    ->searchable()
                    ->label('Lengan'),

                Tables\Columns\TextColumn::make('modelJersey.nama')
                    ->sortable()
                    ->searchable()
                    ->label('Model Jersey'),

                Tables\Columns\TextColumn::make('ukuran.nama')
                    ->sortable()
                    ->searchable()
                    ->label('Ukuran'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    protected function handleRecordCreation(array $data): Model
    {
        $order = Order::create([
            'order_number' => $data['order_number'],
            'customer_id' => $data['customer_id'],
            'nama_customer' => $data['nama_customer'],
        ]);

        foreach ($data['order_items'] as $item) {
            $order->orderItems()->create([
                'nama_order' => $item['nama_order'],
                'material_id' => $item['material_id'],
                'kerah_id' => $item['kerah_id'],
                'lengan_id' => $item['lengan_id'],
                'model_jersey_id' => $item['model_jersey_id'],
                'ukuran_id' => $item['ukuran_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return $order;
    }
}
