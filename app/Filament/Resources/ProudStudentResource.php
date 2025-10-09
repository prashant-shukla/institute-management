<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProudStudentResource\Pages;
use App\Models\ProudStudent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProudStudentResource extends Resource
{
    protected static ?string $model = ProudStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Proud Students';
    protected static ?string $navigationGroup = 'Institute';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->label('Student Image')
                    ->image() // केवल image upload allow करेगा
                    ->directory('proud-students') // storage/app/public/proud-students में save होगा
                    ->maxSize(2048) // 2MB तक limit
                    ->nullable(),

                Forms\Components\TextInput::make('role')
                    ->label('Role / Title')
                    ->maxLength(255),

                Forms\Components\TextInput::make('company')
                    ->label('Company')
                    ->maxLength(255),

                Forms\Components\TextInput::make('company_url')
                    ->label('Company URL')
                    ->url(),

                Forms\Components\TextInput::make('package')
                    ->label('Salary Package')
                    ->maxLength(100),

                Forms\Components\Textarea::make('message')
                    ->label('Review / Story')
                    ->rows(3),

                Forms\Components\Select::make('rating')
                    ->options([
                        1 => '⭐',
                        2 => '⭐⭐',
                        3 => '⭐⭐⭐',
                        4 => '⭐⭐⭐⭐',
                        5 => '⭐⭐⭐⭐⭐',
                    ])
                    ->default(5)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('package')->sortable(),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProudStudents::route('/'),
            'create' => Pages\CreateProudStudent::route('/create'),
            'edit' => Pages\EditProudStudent::route('/{record}/edit'),
        ];
    }
}
