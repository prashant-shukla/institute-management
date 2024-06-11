<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewResource\Pages;
use App\Filament\Resources\NewResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Radio;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Textarea;

class NewResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Institute';

    protected static ?int $navigationSort = -170;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Title')
                ->label('Title')
                ->columnSpanFull()
                ->required(),
                Forms\Components\FileUpload::make('Attachment')
                ->label('Attachment'),
                Forms\Components\Radio::make('Status')
                ->options([
                '0' => 'Draft',
                '1' => 'Scheduled',
                '2' => 'Published'
                 ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable()
                ->toggleable(),
             
                Tables\Columns\TextColumn::make('status')
                ->searchable()
                ->sortable()
                ->toggleable()
                ->formatStateUsing(function ($state) {
                    return [
                        '0' => 'Draft',
                        '1' => 'Scheduled',
                        '2' => 'Published'
                    ][$state] ?? 'Unknown';
                }),
                    
            ])
            // ->filters([
            //         SelectFilter::make('status')
            //             ->options([
            //                 'Draft' => '0',
            //                 'Reviewing' => '1',
            //                 'Published' => '2',
            //             ]),
            // ])
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNew::route('/create'),
            'edit' => Pages\EditNew::route('/{record}/edit'),
        ];
    }
}
