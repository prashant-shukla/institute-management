<?php

namespace App\Filament\Resources;

// use Adminer\Db;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers\FeesRelationManager;
use App\Filament\Resources\StudentResource\RelationManagers\UsersWithoutStudentRelationManager;
use App\Filament\Widgets\UsersWithoutStudent;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Models\Certificate;
use Carbon\Carbon;




class StudentResource extends Resource
{
    public static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = '';
    protected static ?string $navigationLabel = 'Student';
    protected static ?string $title = 'Student';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // LEFT SIDE (2 columns): User + Personal details
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('User')
                            ->relationship('user')
                            ->schema([
                                TextInput::make('firstname')
                                    ->required(),

                                TextInput::make('lastname'),

                                // TextInput::make('username')
                                //     ->required()
                                //     ->unique(ignoreRecord: true),

                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->unique(ignoreRecord: true),

                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->nullable()
                                    ->revealable()
                                    // sirf value di ho tab hi hash kare
                                    ->dehydrateStateUsing(
                                        fn($state) =>
                                        filled($state) ? Hash::make($state) : null
                                    )
                                    // agar field khali ho to DB me password update na ho
                                    ->dehydrated(fn($state) => filled($state)),
                            ])
                            ->columns(2),

                        Section::make('PERSONAL DETAILS')
                            ->schema([
                                FileUpload::make('photo')
                                    ->image()
                                    ->imageEditor(),

                                TextInput::make('father_name')
                                    ->required()
                                    ->maxLength(255),

                                DatePicker::make('date_of_birth')
                                    ->label('Date of Birth')
                                    ->required()
                                    ->native(false)   // ✅ Modern popup calendar
                                    ->displayFormat('d M Y')
                                    ->closeOnDateSelection()
                                    ->maxDate(now()),

                                TextInput::make('mobile_no')
                                    ->label('Phone No')
                                    ->required()
                                    ->numeric(),

                                Textarea::make('correspondence_add')
                                    ->required()
                                    ->label('Correspondence Address')
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        if ($get('same_Address')) {
                                            $set('permanent_add', $state);
                                        }
                                    })
                                    ->autosize(),

                                Checkbox::make('same_Address')
                                    ->label('Same Address')
                                    ->inline(false)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        if ($state) {
                                            $set('permanent_add', $get('correspondence_add'));
                                        }
                                    }),

                                Textarea::make('permanent_add')
                                    ->required()
                                    ->label('Permanent Address')
                                    ->autosize(),

                                TextInput::make('qualification')
                                    ->required(),

                                TextInput::make('college_workplace')
                                    ->label('College/Workplace'),

                                TextInput::make('residential_no')
                                    ->label('Residential No'),

                                TextInput::make('office_no')
                                    ->label('Office No'),

                                Forms\Components\Toggle::make('is_online')
                                    ->label('Is Online?')
                                    ->default(false)
                                    ->inline(false)
                                    ->hidden(),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                // RIGHT SIDE (1 column): Registration + Course
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('REGISTRATION DETAILS')
                            ->schema([
                                DatePicker::make('reg_date')
                                    ->label('Reg Date')
                                    ->default(now())
                                    ->disabled()
                                    ->dehydrated(true), // value save hogi database me


                                // TextInput::make('reg_no')
                                //     ->label('Reg No')
                                //     ->default(function () {
                                //         $lastReg = DB::table('students')
                                //             ->orderBy('id', 'desc')
                                //             ->value('reg_no');

                                //         return $lastReg ? $lastReg + 1 : 'CA1001' / 1001;
                                //     })
                                //     ->disabled()
                                //     ->dehydrated(true)
                                //     ->numeric()
                                //     ->required(),
                                    
                                TextInput::make('reg_no')
                                    ->label('Reg No')
                                    ->disabled()
                                    ->dehydrated(false),

                            ]),

                        Section::make('COURSE DETAILS')
                            ->schema([
                                Select::make('course_id')
                                    ->label('Course Name')
                                    ->required()
                                    ->relationship('course', 'name'),

                                Forms\Components\Toggle::make('calculate_gst')
                                    ->label('Calculate GST?')
                                    ->default(true)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        $courseFee = $get('course_fee') ?? 0;

                                        if ($state) {
                                            $gst   = $courseFee * 0.18;
                                            $total = $courseFee + $gst;
                                            $set('gst_amount', $gst);
                                            $set('total_fee', $total);
                                        } else {
                                            $set('gst_amount', 0);
                                            $set('total_fee', $courseFee);
                                        }
                                    }),

                                TextInput::make('course_fee')
                                    ->label('Course Fee')
                                    ->required()
                                    ->numeric()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        if ($get('calculate_gst')) {
                                            $gst   = $state * 0.18;
                                            $total = $state + $gst;
                                            $set('gst_amount', $gst);
                                            $set('total_fee', $total);
                                        } else {
                                            $set('gst_amount', 0);
                                            $set('total_fee', $state);
                                        }
                                    })
                                    ->afterStateHydrated(function ($state, callable $set, $get) {
                                        if ($get('calculate_gst')) {
                                            $gst   = $state * 0.18;
                                            $total = $state + $gst;
                                            $set('gst_amount', $gst);
                                            $set('total_fee', $total);
                                        } else {
                                            $set('gst_amount', 0);
                                            $set('total_fee', $state);
                                        }
                                    }),

                                TextInput::make('gst_amount')
                                    ->label('GST 18%')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated(fn($state) => true),

                                TextInput::make('total_fee')
                                    ->label('Total Fee')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated(fn($state) => true),
                            ])
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reg_no')
                    ->label('Reg No')
                    ->action(
                        Tables\Actions\Action::make('receipt')
                            ->label('View Receipt')
                            ->icon('heroicon-o-document-text')
                            ->modalHeading('Student Details')
                            ->modalContent(fn($record) => view(
                                'students.receipt',
                                ['student' => Student::with('feeReceipts')->findOrFail($record->id)]
                            ))
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Close'),
                    ),

                Tables\Columns\TextColumn::make('user.full_name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('course.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->label('Course'),

                Tables\Columns\ToggleColumn::make('certificate_assigned')
                    ->label('Certificate')
                    ->onColor('success')
                    ->offColor('danger')
                    ->afterStateUpdated(function ($record, $state) {
                        if ($state) {
                            $student = Student::with('user')->find($record->id);
                            $studentName = trim(
                                ($student->user->firstname ?? '') . ' ' .
                                    ($student->user->lastname ?? '')
                            );

                            Certificate::create([
                                'student_id'     => $record->id,
                                'course_id'      => $record->course_id,
                                'name'           => $studentName,
                                'certificate_no' => 'CAD-' . strtoupper(uniqid()),
                                'issue_date'     => Carbon::now(),
                            ]);
                        } else {
                            Certificate::where('student_id', $record->id)
                                ->where('course_id', $record->course_id)
                                ->delete();
                        }
                    }),

                Tables\Columns\TextColumn::make('reg_date')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('is_online')
                    ->label('Status')
                    ->sortable()
                    ->colors([
                        'success' => fn($state): bool => $state === true,
                        'danger'  => fn($state): bool => $state === false,
                    ])
                    ->formatStateUsing(fn($state): string => $state ? 'Online' : 'Offline'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_online')
                    ->label('Status')
                    ->options([
                        1 => 'Online',
                        0 => 'Offline',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->tooltip('Detail'),
                Tables\Actions\EditAction::make()->hiddenLabel()->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->tooltip('Delete'),

                Tables\Actions\Action::make('certificate')
                    ->icon('heroicon-o-check-circle')
                    ->color(fn($record) => Certificate::where('student_id', $record->id)
                        ->where('course_id', $record->course_id)
                        ->exists() ? 'success' : 'secondary')
                    ->tooltip(fn($record) => Certificate::where('student_id', $record->id)
                        ->where('course_id', $record->course_id)
                        ->exists() ? 'View Certificate' : 'No Certificate Assigned')
                    ->url(function ($record) {
                        $certificateId = Certificate::where('student_id', $record->id)
                            ->where('course_id', $record->course_id)
                            ->value('id');

                        return $certificateId
                            ? route('certificate.show', ['id' => $certificateId])
                            : null;
                    }, shouldOpenInNewTab: true)
                    ->disabled(fn($record) => !Certificate::where('student_id', $record->id)
                        ->where('course_id', $record->course_id)
                        ->exists()),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FeesRelationManager::class,
            // \App\Filament\Widgets\UsersWithoutStudent::class,
        ];
    }


    public static function getWidgets(): array
    {
        return [
            UsersWithoutStudent::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'view'   => Pages\ViewStudent::route('/{record}'),
            'edit'   => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
