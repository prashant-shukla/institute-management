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
use App\Models\Exam;
use App\Models\ExamQuestion;

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
            ->filters([
                Tables\Filters\SelectFilter::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->headerActions([
                Action::make('assign_to_exam')
                    ->label('Assign Questions to Exam')
                    // ->icon('heroicon-s-clipboard-check')
                    ->form([
                        Forms\Components\Select::make('exam_id')
                            ->label('Select Exam')
                            ->options(Exam::pluck('name', 'id'))
                            ->reactive()
                            ->required(),
            
                        Forms\Components\MultiSelect::make('question_ids')
                            ->label('Select Questions')
                            ->relationship('questions', 'question') 
                            // ❌ We'll override the options dynamically below
                            ->options(function ($get) {
                                $examId = $get('exam_id');
                                if (!$examId) return [];
            
                                $exam = Exam::find($examId);
                                if (!$exam) return [];
            
                                // Return only questions matching the exam's category
                                return \App\Models\Question::where('exam_category_id', $exam->exam_category_id)
                                    ->pluck('question', 'id');
                            })
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $examId = $data['exam_id'];
                        $questionIds = $data['question_ids'] ?? [];
            
                        foreach ($questionIds as $qid) {
                            // Insert into exam_question pivot table, skip duplicates
                            ExamQuestion::firstOrCreate([
                                'exam_id' => $examId,
                                'question_id' => $qid,
                            ]);
                        }
            
                        \Filament\Notifications\Notification::make()
                            ->title('Questions assigned to exam successfully!')
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
