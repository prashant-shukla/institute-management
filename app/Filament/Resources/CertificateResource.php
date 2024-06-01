<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;
use App\Models\Certificate;
use App\Models\Certificate_fields;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\Student;
use App\Models\Course;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;


class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->columnSpanFull()
                ->required(),
                Forms\Components\TextInput::make('title')
                ->label('Title'),
                Forms\Components\Select::make('course_id')
                ->label('Course')
                ->options(Course::all()->pluck('name', 'id')->toArray())
                ->searchable(),

                Forms\Components\FileUpload::make('logo_path')
                ->label('Logo Image'),
                Forms\Components\FileUpload::make('background_path')
                ->label('Background Image'),

                Repeater::make('elements')
                ->schema([
                    Select::make('field_name')
                    ->label('Field Name')
                    ->options(Certificate_fields::all()->pluck('field_name', 'id')->toArray()) // Ensure this returns an array with proper key-value pairs
                    ->searchable()
                    ->required(),
                    Forms\Components\TextInput::make('top')
                    ->required()
                    ->label('Top (px)')
                    ->numeric(),
                    Forms\Components\TextInput::make('left')
                    ->label('Left (px)')
                    ->numeric()
                    ->required(),
                ])
                  ->columnSpanFull()
                  ->columns(3),

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
                    Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                    Tables\Columns\TextColumn::make('course.name')
                    ->sortable()
                    ->toggleable(),
                    
                    ])
            
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
