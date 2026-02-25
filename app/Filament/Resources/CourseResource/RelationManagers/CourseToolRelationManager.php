<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Models\CourseTool;
use App\Models\Tool;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseToolRelationManager extends RelationManager
{
    protected static string $relationship = 'CourseTool';
    protected static ?string $navigationLabel = 'Software';
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tool_id')
                ->options(Tool::all()->pluck('name', 'id'))
                ->required(),
              TextInput::make('sort')
                ->label('Sort')
              ,
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('tool.name')
                ->label('Tool')
                ->sortable()
                ->searchable(),
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
