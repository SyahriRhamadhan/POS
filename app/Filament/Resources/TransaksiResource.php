<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Penjualan';

    public static function getEloquentQuery(): Builder
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'admin') {
            return parent::getEloquentQuery()->where('id_toko', $user->id_toko);
        }

        return parent::getEloquentQuery();
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_costumer')
                    ->relationship('costumer', 'name')
                    ->searchable()
                    ->getOptionLabelUsing(fn($record) => "{$record->name} - {$record->alamat} - {$record->no_telp}")
                    ->required()
                    ->label('Pelanggan'),

                Forms\Components\Select::make('id_discount')
                    ->relationship(
                        'discount',
                        'discount',
                        fn($query) => $query->where('status', 'on')
                    )
                    ->required()
                    ->label('Diskon Aktif'),

                Forms\Components\TextInput::make('id_keranjang')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('id_user')
                    ->relationship('user', 'name')
                    ->default(\Illuminate\Support\Facades\Auth::user()->id)
                    ->disabled()
                    ->required()
                    ->label('Admin Penjualan'),

                Forms\Components\Select::make('id_toko')
                    ->relationship('toko', 'nama')
                    ->required()
                    ->label('Toko'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('costumer.name')
                    ->sortable()
                    ->searchable()
                    ->label('Pelanggan'),

                Tables\Columns\TextColumn::make('discount.discount')
                    ->sortable()
                    ->searchable()
                    ->label('Diskon'),

                Tables\Columns\TextColumn::make('keranjang.id')
                    ->sortable()
                    ->label('ID Keranjang'),

                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable()
                    ->label('Admin Penjualan'),

                Tables\Columns\TextColumn::make('toko.nama')
                    ->sortable()
                    ->searchable()
                    ->label('Toko'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat Pada'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Diperbarui'),
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
