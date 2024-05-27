<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('')
            ->schema([
                Forms\Components\TextInput::make('name')->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                            ->dehydrated()
                            ->required()
                            ->maxLength(255),
                Forms\Components\TagsInput::make('Software'),
                Forms\Components\MarkdownEditor::make('Description'),
                Forms\Components\TextInput::make('Sub Title'),
                Forms\Components\FileUpload::make('Image'),
                Forms\Components\TextInput::make('Order'),
                Forms\Components\Radio::make('Show on Website')
                ->options([
                    'Show' => 'show',
                    'Hide' => 'hide',
                ])->inline(),
            ]),
                
            Section::make('SCO')
            ->schema([
                Forms\Components\TextInput::make('Site Title')->columnSpanFull(),
                Forms\Components\Textarea::make('Meta Keywords')
                ->autosize(),
                Forms\Components\Textarea::make('Meta Description')
                ->autosize(),
            ]),
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
