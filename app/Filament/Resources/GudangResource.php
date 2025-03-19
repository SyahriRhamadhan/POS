<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GudangResource\Pages;
use App\Filament\Resources\GudangResource\RelationManagers;
use App\Models\Gudang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GudangResource extends Resource
{
    protected static ?string $model = Gudang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Produk';

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
                Forms\Components\TextInput::make('id_toko')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('id_produk')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stock_gudang')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('lokasi_gudang')
                    ->options([
                        'pusat' => 'Pusat',
                        'cabang' => 'Cabang',
                    ])
                    ->required()
                    ->default('pusat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_toko')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_produk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_gudang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi_gudang'),
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
            'index' => Pages\ListGudangs::route('/'),
            'create' => Pages\CreateGudang::route('/create'),
            'edit' => Pages\EditGudang::route('/{record}/edit'),
        ];
    }
}
