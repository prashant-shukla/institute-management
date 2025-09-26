<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

       public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(100),

                Forms\Components\Textarea::make('short_description')
                    ->label('Short Description')
                    ->rows(2)
                    ->maxLength(255),

                Forms\Components\Textarea::make('review')
                    ->label('Review')
                    ->required()
                    ->maxLength(500),

                Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('testimonials')
                    ->maxSize(2048),

                Forms\Components\Select::make('star_rating')
                    ->label('Star Rating')
                    ->options([
                        1 => '★☆☆☆☆ (1)',
                        2 => '★★☆☆☆ (2)',
                        3 => '★★★☆☆ (3)',
                        4 => '★★★★☆ (4)',
                        5 => '★★★★★ (5)',
                    ])
                    ->default(5)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('short_description')
                    ->label('Short Description')
                    ->limit(50),

                Tables\Columns\TextColumn::make('review')
                    ->label('Review')
                    ->limit(50),

                Tables\Columns\TextColumn::make('star_rating')
                    ->label('Rating')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => str_repeat('★', $state) . str_repeat('☆', 5 - $state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
