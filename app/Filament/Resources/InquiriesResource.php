<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InquiriesResource\Pages;
use App\Models\Inquiries;
use App\Models\CourseCategory;
use App\Models\Tool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InquiriesResource extends Resource
{
    protected static ?string $model = Inquiries::class;

    protected static ?string $navigationGroup = 'Institute';
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?int $navigationSort = 601;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email(),

                Forms\Components\TextInput::make('mobile')
                    ->label('Mobile')
                    ->tel()
                    ->maxLength(20),

                Forms\Components\Textarea::make('address')
                    ->label('Address')
                    ->maxLength(500),

                Forms\Components\TextInput::make('qualification')
                    ->label('Qualification')
                    ->maxLength(255),

                Forms\Components\Select::make('course_category_id')
                    ->label('Branch / Course Category')
                    ->options(CourseCategory::all()->pluck('name', 'id'))
                    ->searchable()
                    ->nullable(),

                Forms\Components\Select::make('tool_id')
                    ->label('Tool')
                    ->options(Tool::all()->pluck('name', 'id'))
                    ->searchable()
                    ->nullable(),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->maxLength(1000),
                   
                Forms\Components\Toggle::make('is_online')
                    ->label('Is Online?')
                    ->default(false) // offline by default
                    ->inline(false)
                    ->hidden(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('mobile')->label('Mobile')->sortable(),
                Tables\Columns\TextColumn::make('qualification')->label('Qualification'),
                Tables\Columns\TextColumn::make('courseCategory.name')->label('Branch / Course'),
                Tables\Columns\TextColumn::make('tool.name')->label('Tool'),
                Tables\Columns\TextColumn::make('created_at')->label('Date')->dateTime('d-M-Y H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detail'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Delete'),
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
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiries::route('/create'),
            'edit' => Pages\EditInquiries::route('/{record}/edit'),
        ];
    }
}
