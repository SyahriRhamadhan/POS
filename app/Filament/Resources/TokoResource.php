<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoResource\Pages;
use App\Filament\Resources\TokoResource\RelationManagers;
use App\Models\Toko;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokoResource extends Resource
{
    protected static ?string $model = Toko::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        // Hanya Superadmin yang bisa menambahkan toko
        return \Illuminate\Support\Facades\Auth::user()->role === 'superadmin';
    }

    public static function canDelete($record): bool
    {
        // Hanya Superadmin yang bisa menghapus toko
        return \Illuminate\Support\Facades\Auth::user()->role === 'superadmin';
    }

    public static function canEdit($record): bool
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        // Superadmin bisa mengedit semua toko
        if ($user->role === 'superadmin') {
            return true;
        }

        // Admin hanya bisa mengedit toko mereka sendiri
        return $record->id === $user->id_toko;
    }

    public static function getEloquentQuery(): Builder
    {
        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->role === 'admin') {
            return parent::getEloquentQuery()->where('id', $user->id_toko);
        }

        return parent::getEloquentQuery();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telepon')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('tipe')
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
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe'),
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
            'index' => Pages\ListTokos::route('/'),
            'create' => Pages\CreateToko::route('/create'),
            'edit' => Pages\EditToko::route('/{record}/edit'),
        ];
    }
}
