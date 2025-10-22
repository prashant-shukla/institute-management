<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionImport;
use Filament\Notifications\Notification;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Courses Management';
    protected static ?string $pluralModelLabel = 'Questions';
    protected static ?string $modelLabel = 'Question';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required()
                    ->label('Course'),
                Forms\Components\Textarea::make('question')
                    ->required()
                    ->label('Question'),
                Forms\Components\TextInput::make('option_a')->required()->label('Option A'),
                Forms\Components\TextInput::make('option_b')->required()->label('Option B'),
                Forms\Components\TextInput::make('option_c')->label('Option C'),
                Forms\Components\TextInput::make('option_d')->label('Option D'),
                Forms\Components\Select::make('correct_option')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                    ])
                    ->required()
                    ->label('Correct Option'),
                Forms\Components\TextInput::make('marks')
                    ->numeric()
                    ->default(1)
                    ->label('Marks'),
                Forms\Components\Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.name')->label('Course'),
                Tables\Columns\TextColumn::make('question')->limit(50),
                Tables\Columns\BadgeColumn::make('correct_option')->colors([
                    'success' => 'A',
                    'warning' => 'B',
                    'info' => 'C',
                    'danger' => 'D',
                ]),
                Tables\Columns\TextColumn::make('marks')->sortable(),
                Tables\Columns\ToggleColumn::make('status')->label('Active'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->headerActions([
                Action::make('import')
                    ->label('Import Questions')
                    ->icon('heroicon-o-arrow-up-tray') // correct icon
                    ->form([
                        Forms\Components\FileUpload::make('file')
                            ->label('Upload Excel / CSV File')
                            ->required()
                            ->acceptedFileTypes([
                                'text/csv',
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            ]),
                    ])
                    ->action(function (array $data) {
                        $filePath = storage_path('app/' . $data['file']);
                        Excel::import(new QuestionImport, $filePath);

                        Notification::make()
                            ->title('Questions Imported Successfully!')
                            ->success()
                            ->send();
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
