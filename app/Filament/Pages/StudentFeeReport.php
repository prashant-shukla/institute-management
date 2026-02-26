<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\StudentFees;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentFeesExport;

class StudentFeeReport extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';
    protected static ?string $navigationLabel = 'Student Fees';
    protected static ?string $navigationGroup = 'Finance';
    protected static string $view = 'filament.pages.student-fee-report';

    public function table(Table $table): Table
    {
        return $table
        ->query(
            StudentFees::query()
                ->with(['student.user', 'course'])
        )
            ->columns([

                // S No
                Tables\Columns\TextColumn::make('id')
                    ->label('S No')
                    ->rowIndex(),

                // Receipt No
                Tables\Columns\TextColumn::make('receipt_no')
                    ->label('Receipt No')
                    ->searchable()
                    ->sortable(),

                // Student Name from user table
                Tables\Columns\TextColumn::make('student_name')
                    ->label('Student')
                    ->state(function ($record) {

                        $student = $record->student;
                        if (!$student) return '-';

                        $user = $student->user;
                        if (!$user) return '-';

                        return trim($user->firstname . ' ' . $user->lastname);
                    })
                    ->description(
                        fn($record) =>
                        'Reg No: ' . ($record->student->reg_no ?? '-')
                    )
                    ->searchable(),

                // Course
                Tables\Columns\TextColumn::make('course.name')
                    ->label('Course')
                    ->sortable(),

                // Total Fees = (fee_amount + gst_amount) - discount_amount
                Tables\Columns\TextColumn::make('student.total_fee')
                    ->label('Total Fees')
                    ->money('INR')
                    ->badge()
                    ->color('success')
                    ->sortable(),

                // Amount Collected
                Tables\Columns\TextColumn::make('fee_amount')
                    ->label('Amount Collected')
                    ->money('INR')
                    ->description(fn($record) => 'Payment Method: ' . ucfirst($record->payment_mode))
                    ->sortable(),

                // Current Due (Dynamic)
                Tables\Columns\TextColumn::make('current_due')
                ->label('Current Due')
                ->money('INR')
                ->state(function ($record) {
            
                    if (!$record->student) {
                        return 0;
                    }
            
                    // Student table se total fee
                    $totalFee = $record->student->total_fee ?? 0;
            
                    // Same student + same course ke total payments
                    $totalPaid = \App\Models\StudentFees::where('student_id', $record->student_id)
                        ->where('course_id', $record->course_id)
                        ->sum('fee_amount');
            
                    return max($totalFee - $totalPaid, 0);
                })
                ->color(fn ($state) => $state > 0 ? 'danger' : 'success'),

                // Date
                Tables\Columns\TextColumn::make('received_on')
                    ->label('Date')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([Tables\Filters\Filter::make('month')
                ->form([\Filament\Forms\Components\Select::make('month')
                    ->label('Select Month')
                    ->options(collect(range(1, 12))
                        ->mapWithKeys(fn($m) => [$m => date('F', mktime(0, 0, 0, $m, 1))]))])
                ->query(function (Builder $query, array $data) {
                    if ($data['month'] ?? null) {
                        $query->whereMonth('received_on', $data['month']);
                    }
                }),])
                ->headerActions([
                    Tables\Actions\Action::make('export')
                        ->label('Export Excel')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function () {
                            return Excel::download(
                                new StudentFeesExport(now()->format('Y-m')),
                                'student-fees.xlsx'
                            );
                        }),
                
                    Tables\Actions\Action::make('add_fee')
                        ->label('Add Student Fee')
                        ->icon('heroicon-o-plus')
                        ->color('success')
                        ->url(route('filament.admin.resources.student-fees.create')),
                    ]);
    }

}
