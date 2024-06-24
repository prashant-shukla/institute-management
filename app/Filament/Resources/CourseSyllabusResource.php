<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseSyllabusResource\Pages;
use App\Filament\Resources\CourseSyllabusResource\RelationManagers;
use App\Models\CourseSyllabus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;


class CourseSyllabusResource extends Resource
{
    protected static ?string $model = CourseSyllabus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('course_id')->required()->relationship('course', 'name'),
            TextInput::make('title')
                ->label('Title')
                ->maxLength(100)
                ->required(),
            Textarea::make('description')
                ->label('Description')
                ->nullable(),
            TextInput::make('course_duration')
                ->label('Course Duration')
                ->nullable(),
            TextInput::make('live_sessions')
                ->label('Live Sessions')
                ->nullable(),
            TextInput::make('projects')
                ->label('Projects')
                ->nullable(),
            Select::make('mode')
                ->label('Mode')
                ->options([
                    'online' => 'Online',
                    'offline' => 'Offline',
                    'both' => 'Both',
                ])
                ->required(),
            TextInput::make('assignment')
                ->label('Assignment')
                ->nullable(),
            TextInput::make('order')
                ->label('Order')
                ->nullable()
                ->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable(),
                    TextColumn::make('mode')
                    ->label('Mode'),
                    TextColumn::make('course_duration')
                    ->label('Course Duration'),
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
            'index' => Pages\ListCourseSyllabi::route('/'),
            'create' => Pages\CreateCourseSyllabus::route('/create'),
            'edit' => Pages\EditCourseSyllabus::route('/{record}/edit'),
        ];
    }
}
