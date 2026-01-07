<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentCourseResource\Pages;
use App\Models\StudentCourse;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentCourseResource extends Resource
{
    protected static ?string $model = StudentCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Student Courses';
    protected static ?string $navigationGroup = 'Academics';

    /* =======================
     * FORM
     * ======================= */
    public static function form(Form $form): Form
    {
        return $form->schema([

            /* STUDENT */
Forms\Components\Select::make('student_id')
    ->label('Student')
    ->options(
        \App\Models\Student::with('user')
            ->get()
            ->mapWithKeys(fn ($student) => [
                $student->id =>
                    trim(
                        ($student->user->firstname ?? '') . ' ' .
                        ($student->user->lastname ?? '')
                    )
            ])
    )
    ->searchable()
    ->required(),


            /* COURSE */
            Forms\Components\Select::make('course_id')
                ->label('Course')
                ->relationship('course', 'name')
                ->searchable()
                ->reactive()
                ->required()
                ->afterStateUpdated(function ($state, callable $set) {
                    $course = Course::find($state);

                    if ($course) {
                        $set('course_fee', $course->offer_fee);
                        $set('discount', 0);
                        $set('gst_amount', 18);

                        $set('total_fee', $course->offer_fee);
                        $gst = ($course->offer_fee * 18) / 100;

                        $set('gst_amount', round($gst, 2));
                        $set('grand_total', round($course->offer_fee + $gst, 2));
                    }
                }),

            Forms\Components\TextInput::make('course_fee')
                ->numeric()
                ->readOnly()
                ->required(),

            Forms\Components\TextInput::make('discount')
                ->numeric()
                ->default(0)
                ->reactive()
                ->afterStateUpdated(
                    fn($state, callable $set, callable $get) =>
                    self::recalculateFee($set, $get)
                ),

            Forms\Components\TextInput::make('gst_amount')
                ->label('GST (18%)')
                ->numeric()
                ->readOnly(),

            Forms\Components\TextInput::make('total_fee')
                ->label('Total Fee')
                ->numeric()
                ->readOnly(),


            /* GST AMOUNT */
            Forms\Components\TextInput::make('gst_amount')
                ->numeric()
                ->readOnly(),

            /* FINAL PAYABLE */
            Forms\Components\TextInput::make('grand_total')
                ->label('Final Payable Amount')
                ->numeric()
                ->readOnly(),

            /* MODE */
            Forms\Components\Select::make('mode')
                ->options([
                    'online'  => 'Online',
                    'offline' => 'Offline',
                ])
                ->required(),

            /* STATUS */
            Forms\Components\Select::make('status')
                ->options([
                    'active'     => 'Active',
                    'completed'  => 'Completed',
                    'cancelled'  => 'Cancelled',
                ])
                ->required(),

            /* ENROLL DATE */
            Forms\Components\DatePicker::make('enrolled_at')
                ->default(now())
                ->required(),
        ]);
    }
    protected static function recalculateFee(callable $set, callable $get): void
    {
        $courseFee = (float) ($get('course_fee') ?? 0);
        $discount  = (float) ($get('discount') ?? 0);

        // Base fee after discount
        $baseFee = max($courseFee - $discount, 0);

        $gstAmount = 0;
        $totalFee  = $baseFee;

        // ✅ CONDITION:
        // agar total_fee course_fee se zyada ho → GST 18%
        if ($baseFee > $courseFee) {
            $gstAmount = $baseFee * 0.18;
            $totalFee  = $baseFee + $gstAmount;
        }

        $set('gst_amount', round($gstAmount, 2));
        $set('total_fee', round($totalFee, 2));
    }


    /* =======================
     * TABLE
     * ======================= */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.full_name')->label('Student'),
                Tables\Columns\TextColumn::make('course.name')->label('Course'),
                Tables\Columns\TextColumn::make('mode')->badge(),
                Tables\Columns\TextColumn::make('course_fee')->money('INR'),
                Tables\Columns\TextColumn::make('discount')->money('INR'),
                Tables\Columns\TextColumn::make('gst_amount')->money('INR')->label('GST'),
                Tables\Columns\TextColumn::make('grand_total')->money('INR')->label('Final'),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('enrolled_at')->date(),
            ])
            ->defaultSort('id', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    /* =======================
     * CALCULATION HELPER
     * ======================= */
    protected static function recalculate(callable $set, callable $get): void
    {
        $courseFee  = (float) ($get('course_fee') ?? 0);
        $discount   = (float) ($get('discount') ?? 0);
        $gstPercent = (float) ($get('gst_percent') ?? 0);

        $totalFee  = max($courseFee - $discount, 0);
        $gstAmount = ($totalFee * $gstPercent) / 100;
        $grand     = $totalFee + $gstAmount;

        $set('total_fee', round($totalFee, 2));
        $set('gst_amount', round($gstAmount, 2));
        $set('grand_total', round($grand, 2));
    }

    /* =======================
     * PAGES
     * ======================= */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStudentCourses::route('/'),
            'create' => Pages\CreateStudentCourse::route('/create'),
            'edit'   => Pages\EditStudentCourse::route('/{record}/edit'),
        ];
    }
}
