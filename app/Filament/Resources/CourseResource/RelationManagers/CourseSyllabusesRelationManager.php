<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\CourseSyllabuses;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;

class CourseSyllabusesRelationManager extends RelationManager
{
    protected static string $relationship = 'CourseSyllabuses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('course_id')->required()->relationship('course', 'name'),
                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(100)
                    ->required(),
                RichEditor::make('description')
                    ->label('Description')
                    ->nullable(),
                TextInput::make('order')
                    ->label('Order')
                    ->nullable()
                    ->numeric(),
                Repeater::make('extra_info')
                    ->schema([
                        TextInput::make('name'),
                        TextInput::make('value'),
                    ]) ->columns(2)
                    ->columnSpan('full'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('course_id')
            ->columns([
                
                    Tables\Columns\TextColumn::make('title'),
               
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
