<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Models\StudentFees;
use Illuminate\Database\Eloquent\Builder;
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
                StudentFees::query()->with(['student', 'course'])
            )

            ->columns([
                Tables\Columns\TextColumn::make('student.reg_no')
                    ->label('Reg No')
                    ->searchable(),

                // Tables\Columns\TextColumn::make('student.name')
                //     ->label('Student Name')
                //     ->searchable(),

                Tables\Columns\TextColumn::make('course.name')
                    ->label('Course'),

                Tables\Columns\TextColumn::make('fee_amount')
                    ->label('Amount')
                    ->money('INR'),

                Tables\Columns\TextColumn::make('received_on')
                    ->label('Date')
                    ->date(),
            ])

            ->filters([
                Tables\Filters\Filter::make('month')
                    ->form([
                        \Filament\Forms\Components\Select::make('month')
                            ->label('Select Month')
                            ->options(
                                collect(range(1, 12))->mapWithKeys(fn($m) => [
                                    $m => date('F', mktime(0, 0, 0, $m, 1))
                                ])
                            )
                    ])
                    ->query(function (Builder $query, array $data) {
                        if ($data['month'] ?? null) {
                            $query->whereMonth('received_on', $data['month']);
                        }
                    }),
            ])

            ->headerActions([
                Tables\Actions\Action::make('export')
                    ->label('Export Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        return Excel::download(
                            new StudentFeesExport(now()->format('Y-m')),
                            'student-fees.xlsx'
                        );
                    })
            ]);
    }
}