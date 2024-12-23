<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaucherResource\Pages;
use App\Filament\Resources\VaucherResource\RelationManagers;
use App\Filament\Resources\VaucherResource\RelationManagers\VaucherTreeIncomesRelationManager;
use App\Models\Vaucher;
use BladeUI\Icons\Components\Icon;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class VaucherResource extends Resource
{
    protected static ?string $model = Vaucher::class;
    protected static ?string $navigationLabel = 'Vaucherlar';
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    TextInput::make('name')->label('Vaucher nomi')
                    ->required(),
                    
                    Grid::make()
                    ->columns(3)
                    ->schema([
                        TextInput::make('tur_packet_share')->label('Tur paket ulushi')->numeric()
                        ->required()->prefixIcon('heroicon-o-percent-badge')->prefixIconColor('info'),

                        TextInput::make('hotel_share')->label('AAA group mehmonxonalaridan ulush')->numeric()
                        ->required()->prefixIcon('heroicon-o-percent-badge')->prefixIconColor('info'),

                        TextInput::make('cashback')->label('10% cashback')->numeric()->default(10)
                        ->required()->prefixIcon('heroicon-o-percent-badge')->prefixIconColor('info'),
                    ]),
                    Grid::make()
                    ->columns(3)
                    ->schema([
                        Toggle::make('personal_partner_share')->label('Shaxsiy hamkor ulushi'),
                        Toggle::make('level_up')->live()->label('Kattaroq vaucherga o’tish imkoni'),
                        Toggle::make('promotion')->label('Aksiyalar'),
                    ]),
                    Textarea::make('level_up_detail')
                    ->label('Kattaroq vaucherga o’tish sharti')
                    ->rows(5)
                    ->visible(fn(Get $get): bool => $get('level_up'))
                    
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Vaucher'),
                IconColumn::make('personal_partner_share')->label('Shaxsiy hamkor ulushi')->boolean()->alignCenter(),
                IconColumn::make('level_up')->label('Kattaroq vaucherga o’tish')->boolean()->alignCenter(),
                IconColumn::make('promotion')->label('Aksiyalar')->boolean()->alignCenter(),
                TextColumn::make('tur_packet_share')->label('Tur paket ulushi')->alignCenter()->suffix('%'),
                TextColumn::make('hotel_share')->label('Mehmonxonalardan ulush')->alignCenter()->suffix('%'),
                TextColumn::make('cashback')->suffix('%')->alignCenter(),
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
            VaucherTreeIncomesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVauchers::route('/'),
            'create' => Pages\CreateVaucher::route('/create'),
            'edit' => Pages\EditVaucher::route('/{record}/edit'),
        ];
    }
}
