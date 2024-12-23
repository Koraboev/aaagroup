<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Vaucher;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Hamkorlar';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Grid::make()
                    ->schema([
                        TextInput::make('name')->label('Hamkor nomi')->required(),
                        Select::make('offerer_id')->label('Hamkor taklifchisi')
                        ->options(User::all()->pluck('name', 'id'))
                        ->required(),
                    ]),
                    Grid::make()
                    ->schema([
                        Select::make('vaucher_id')->label('Vaucher')
                        ->required()
                        ->options(Vaucher::all()->pluck('name', 'id')),
                        Select::make('parent_id')->label('Yuqori hamkor')
                        ->options(User::all()->pluck('name', 'id'))
                        ->required(),
                    ]),
                    Grid::make()
                    ->schema([
                        Select::make('position')->label('Hamkor daraxtda joylashuvi')
                        ->options([
                            'left'=>'Chap',
                            'right' => 'O`ng',
                            'root' => 'Ildiz'
                        ])
                        ->required(),
                        DatePicker::make('start_job_date')->required()->label('Ish boshlash sanasi'),
                    ]),
                    Toggle::make('is_active')->default(true)
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                ]),
                Section::make()
                ->schema([                    
                    TextInput::make('email')->label('Login')
                    ->default('AAA'.rand(999999,100000))
                    ->unique(User::class, 'email', ignoreRecord: true)
                    ->prefixIcon('heroicon-o-lock-closed')
                    ->live(),
                    TextInput::make('password')->label('Parol')
                    ->default(fn(Get $get) => $get('email'))
                    ->prefixIcon('heroicon-o-key')
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('role', 'user'))
            ->columns([
                
                TextColumn::make('name')->label('Hamkor'),
                TextColumn::make('Parent.name')->label('Yuqori hamkor')->color('info'),
                TextColumn::make('Offerer.name')->label('Hamkor taklifchisi'),
                TextColumn::make('Vaucher.name')->badge()->color('info'),
                TextColumn::make('position')->label('Joylashuv'),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('start_job_date')->label('Boshlangan vaqt'),
                
            ])

            ->filters([

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
    protected function getTableQuery(): Builder
    {
        // Ensure the table itself only displays users with the role 'user'
        return parent::getTableQuery()->where('role', 'user');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
