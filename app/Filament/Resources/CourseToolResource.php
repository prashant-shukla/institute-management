<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseToolResource\Pages;
use App\Filament\Resources\CourseToolResource\RelationManagers;
use App\Models\CourseTool;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseToolResource extends Resource
{
    protected static ?string $model = CourseTool::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\Select::make('course_id')
                        ->label('Course')
                        ->options(Course::all()->pluck('name', 'id'))
                        ->required(),
                    Forms\Components\Select::make('tool_id')
                        ->label('Tool')
                        ->options(Tool::all()->pluck('name', 'id'))
                        ->required(),
                    Forms\Components\TextInput::make('sort')
                        ->label('Sort Order')
                        ->numeric(),
                ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')->label('Course'),
                Tables\Columns\TextColumn::make('tool.name')->label('Tool'),
                Tables\Columns\TextColumn::make('sort')->label('Sort Order'),
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
            'index' => Pages\ListCourseTools::route('/'),
            'create' => Pages\CreateCourseTool::route('/create'),
            'edit' => Pages\EditCourseTool::route('/{record}/edit'),
        ];
    }
}
