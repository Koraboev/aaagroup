<?php

namespace App\Filament\Resources\VaucherResource\RelationManagers;

use App\Models\Vaucher;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VaucherTreeIncomesRelationManager extends RelationManager
{
    protected static string $relationship = 'vaucher_tree_incomes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    TextInput::make('level')->label('Daraja nomi')->required(),
                    TextInput::make('share')->label('Darajaga muvofiq ulush')->numeric()
                    ->required()->prefixIcon('heroicon-o-percent-badge')->prefixIconColor('info'),
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('level')
            ->columns([
                TextColumn::make('level')->label('Level nomi'),
                TextColumn::make('share')->label('Darajaga muvofiq ulush')->alignCenter()->suffix('%')->badge()->color('info')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
