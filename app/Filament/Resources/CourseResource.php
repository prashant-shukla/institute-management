<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Student;
use App\Models\Branch;

use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('')
            ->schema([
                Forms\Components\TextInput::make('Name')->columnSpanFull(),
                Forms\Components\TextInput::make('Slug')
                ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255),
                Forms\Components\TagsInput::make('Course Period'),
                Forms\Components\Select::make('branch_id')
             ->label('Branch')
             ->options(Branch::all()->pluck('name', 'id'))
             ->searchable(),
                Forms\Components\Radio::make('Show on Website')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4 or more'=>'4 or more'
                ]),
                Forms\Components\Checkbox::make('Is Popular Course'),
                Forms\Components\FileUpload::make('Image'),
                Forms\Components\MarkdownEditor::make('Description'),
            ]),
                
            Section::make('SCO')
            ->schema([
                Forms\Components\TextInput::make('Site Title')->columnSpanFull(),
                Forms\Components\Textarea::make('Meta Keywords')
                ->autosize(),
                Forms\Components\Textarea::make('Meta Description')
                ->autosize(),
               
            ])->columns(1),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make(name:'name')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make('Branch')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make('Popular Course')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make('Max Software')
            ->searchable()
            ->sortable()
            ->toggleable(),
            Tables\Columns\TextColumn::make('Action')
            ->searchable()
            ->sortable()
            ->toggleable(),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
    public static function getNavigationGroup(): ?string
    {
        return __("menu.nav_group.blog");
    }
}
