<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentFeesResource\Pages;
use App\Models\StudentFees;
use App\Models\Student;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentFeesExport;


class StudentFeesResource extends Resource
{
    protected static ?string $model = StudentFees::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';
    protected static ?string $navigationGroup = 'Finance';
    protected static ?string $navigationLabel = 'Student Fees';

    /* ===========================
       FORM
    ============================ */

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->columns(2)
    //         ->schema([

    //             Forms\Components\Select::make('student_id')
    //                 ->label('Student')
    //                 ->relationship('student', 'reg_no')
    //                 ->getOptionLabelFromRecordUsing(
    //                     fn($record) =>
    //                     $record->reg_no . ' - ' . $record->user->firstname . ' ' . $record->user->lastname
    //                 )
    //                 ->searchable()
    //                 ->preload()
    //                 ->required(),

    //             Forms\Components\Select::make('course_id')
    //                 ->label('Course')
    //                 ->relationship('course', 'name')
    //                 ->searchable()
    //                 ->preload()
    //                 ->required(),

    //             Forms\Components\TextInput::make('fee_amount')
    //                 ->label('Amount')
    //                 ->numeric()
    //                 ->required(),

    //             Forms\Components\DatePicker::make('received_on')
    //                 ->label('Received On')
    //                 ->required(),

    //             Forms\Components\Select::make('payment_mode')
    //                 ->options([
    //                     'cash' => 'Cash',
    //                     'upi' => 'UPI',
    //                     'credit_card' => 'Credit Card',
    //                 ])
    //                 ->required(),

    //             Forms\Components\Textarea::make('remark')
    //                 ->columnSpanFull(),

    //         ]);
    // }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
    
                /*
                |--------------------------------------------------------------------------
                | STUDENT INFORMATION
                |--------------------------------------------------------------------------
                */
    
                Forms\Components\Section::make('Student Information')
                    ->columns(3)
                    ->schema([
    
                        Forms\Components\Select::make('student_id')
                            ->label('Reg No')
                            ->relationship('student', 'reg_no')
                            ->searchable()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
    
                                $student = \App\Models\Student::with('course','user')
                                    ->find($state);
    
                                if (!$student) return;
    
                                $set('course_id', $student->course_id);
                            }),
    
                        // VERY IMPORTANT (Hidden field to save course_id)
                        Forms\Components\Hidden::make('course_id')
                            ->required(),
    
                        Forms\Components\Placeholder::make('student_name')
                            ->label('Student Name')
                            ->content(function ($get) {
    
                                $student = \App\Models\Student::with('user')
                                    ->find($get('student_id'));
    
                                if (!$student || !$student->user) return '-';
    
                                return $student->user->firstname . ' ' .
                                       $student->user->lastname;
                            }),
    
                        Forms\Components\Placeholder::make('address')
                            ->label('Address')
                            ->content(function ($get) {
    
                                return \App\Models\Student::find($get('student_id'))
                                    ?->correspondence_add ?? '-';
                            }),
                    ]),
    
                /*
                |--------------------------------------------------------------------------
                | FEES DETAILS
                |--------------------------------------------------------------------------
                */
    
                Forms\Components\Section::make('Fees Details')
                    ->columns(2)
                    ->schema([
    
                        Forms\Components\Placeholder::make('course_title')
                            ->label('Course')
                            ->content(function ($get) {
    
                                return \App\Models\Student::with('course')
                                    ->find($get('student_id'))
                                    ?->course?->name ?? '-';
                            }),
    
                        Forms\Components\Placeholder::make('course_fee')
                            ->label('Course Fee')
                            ->content(function ($get) {
    
                                $fee = \App\Models\Student::find($get('student_id'))
                                    ?->course_fee ?? 0;
    
                                return '₹ ' . number_format($fee, 2);
                            }),
    
                        Forms\Components\Placeholder::make('gst')
                            ->label('GST')
                            ->content(function ($get) {
    
                                $gst = \App\Models\Student::find($get('student_id'))
                                    ?->gst_amount ?? 0;
    
                                return '₹ ' . number_format($gst, 2);
                            }),
    
                        Forms\Components\Placeholder::make('total_fee')
                            ->label('Total Fee')
                            ->content(function ($get) {
    
                                $total = \App\Models\Student::find($get('student_id'))
                                    ?->total_fee ?? 0;
    
                                return '₹ ' . number_format($total, 2);
                            }),
                    ]),
    
                /*
                |--------------------------------------------------------------------------
                | PAYMENT HISTORY
                |--------------------------------------------------------------------------
                */
    
                Forms\Components\Placeholder::make('payment_history')
                    ->label('Received Payment History')
                    ->reactive()
                    ->columnSpanFull()
                    ->content(function ($get) {
    
                        $studentId = $get('student_id');
                        $courseId  = $get('course_id');
    
                        if (!$studentId || !$courseId) {
                            return 'Select student first';
                        }
    
                        $student = \App\Models\Student::find($studentId);
                        if (!$student) return 'Student not found';
    
                        $totalFee = $student->total_fee ?? 0;
    
                        $payments = \App\Models\StudentFees::where('student_id', $studentId)
                            ->where('course_id', $courseId)
                            ->orderBy('received_on', 'asc')
                            ->get();
    
                        if ($payments->isEmpty()) {
                            return "No previous payments";
                        }
    
                        $totalReceived = $payments->sum('fee_amount');
                        $totalDue = max($totalFee - $totalReceived, 0);
    
                        $html = '<table style="width:100%; border-collapse: collapse; text-align:center;">';
                        $html .= '<thead>
                            <tr style="background:#f3f4f6;">
                                <th style="border:1px solid #ddd;padding:6px;">Date</th>
                                <th style="border:1px solid #ddd;padding:6px;">Receipt No</th>
                                <th style="border:1px solid #ddd;padding:6px;">Mode</th>
                                <th style="border:1px solid #ddd;padding:6px;">Amount</th>
                            </tr>
                        </thead><tbody>';
    
                        foreach ($payments as $payment) {
    
                            $date = $payment->received_on
                                ? \Carbon\Carbon::parse($payment->received_on)->format('d/m/Y')
                                : '-';
    
                            $html .= "
                                <tr>
                                    <td style='border:1px solid #ddd;padding:6px;'>{$date}</td>
                                    <td style='border:1px solid #ddd;padding:6px;'>{$payment->receipt_no}</td>
                                    <td style='border:1px solid #ddd;padding:6px;'>" . ucfirst($payment->payment_mode) . "</td>
                                    <td style='border:1px solid #ddd;padding:6px;'>₹" . number_format($payment->fee_amount, 2) . "</td>
                                </tr>";
                        }
    
                        $html .= "</tbody></table>";
    
                        $html .= "
                            <div style='margin-top:15px; text-align:right;'>
                                <div style='font-weight:bold;'>
                                    Total Received: ₹" . number_format($totalReceived, 2) . "
                                </div>
                                <div style='font-weight:bold; color:" . ($totalDue > 0 ? "red" : "green") . ";'>
                                    Total Due: ₹" . number_format($totalDue, 2) . "
                                </div>
                            </div>
                        ";
    
                        return new \Illuminate\Support\HtmlString($html);
                    }),
    
                /*
                |--------------------------------------------------------------------------
                | NEW PAYMENT
                |--------------------------------------------------------------------------
                */
    
                Forms\Components\Section::make('Payment')
                    ->columns(3)
                    ->schema([
    
                        Forms\Components\TextInput::make('fee_amount')
                            ->label('Amount')
                            ->numeric()
                            ->required(),
    
                        Forms\Components\Select::make('payment_mode')
                            ->options([
                                'cash' => 'Cash',
                                'upi' => 'UPI',
                                'cheque' => 'Cheque',
                            ])
                            ->required(),
    
                        Forms\Components\DatePicker::make('received_on')
                            ->label('Received Date')
                            ->required()
                            ->default(fn () => now()),
                    ]),
            ]);
    }

    /* ===========================
       TABLE
    ============================ */

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                // S No
                Tables\Columns\TextColumn::make('id')
                    ->label('S No')
                    ->rowIndex(),

                // Receipt No
                // Tables\Columns\TextColumn::make('receipt_no')
                //     ->label('Receipt No')
                //     ->searchable()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('receipt_no')
                    ->label('Receipt No')
                    ->searchable()
                    ->sortable()
                    ->action(
                        Tables\Actions\Action::make('view_receipt')
                            ->modalHeading(fn($record) => 'Receipt: ' . $record->receipt_no)
                            ->modalSubmitAction(false) // default submit remove
                            ->modalCancelActionLabel('Close')
                            ->modalContent(function ($record) {

                                $studentName = optional($record->student?->user)->firstname . ' ' .
                                    optional($record->student?->user)->lastname;

                                return view('filament.receipt-preview', [
                                    'record' => $record,
                                    'studentName' => $studentName,
                                ]);
                            })
                    ),

                // Student Name
                Tables\Columns\TextColumn::make('student.user.firstname')
                    ->label('Student')
                    ->formatStateUsing(
                        fn($record) =>
                        optional($record->student?->user)->firstname . ' ' .
                            optional($record->student?->user)->lastname
                    )
                    ->description(
                        fn($record) =>
                        'Reg No: ' . ($record->student->reg_no ?? '-')
                    )
                    ->searchable(),

                // Course
                Tables\Columns\TextColumn::make('course.name')
                    ->label('Course')
                    ->sortable(),

                // Total Fees (Student Table se)
                Tables\Columns\TextColumn::make('student.total_fee')
                    ->label('Total Fees')
                    ->money('INR')
                    ->badge()
                    ->color('success'),

                // Amount Collected
                Tables\Columns\TextColumn::make('fee_amount')
                    ->label('Amount Collected')
                    ->money('INR')
                    ->description(
                        fn($record) =>
                        'Payment: ' . ucfirst($record->payment_mode)
                    )
                    ->sortable(),

                // Current Due (Correct Installment Logic)
                Tables\Columns\TextColumn::make('current_due')
                    ->label('Current Due')
                    ->money('INR')
                    ->state(function ($record) {

                        if (!$record->student) return 0;

                        $totalFee = $record->student->total_fee ?? 0;

                        $totalPaid = StudentFees::where('student_id', $record->student_id)
                            ->where('course_id', $record->course_id)
                            ->sum('fee_amount');

                        return max($totalFee - $totalPaid, 0);
                    })
                    ->color(fn($state) => $state > 0 ? 'danger' : 'success'),

                // Date
                Tables\Columns\TextColumn::make('received_on')
                    ->label('Date')
                    ->date('d/m/Y')
                    ->sortable(),
            ])

            ->filters([
                Tables\Filters\Filter::make('month')
                    ->form([
                        Forms\Components\Select::make('month')
                            ->label('Select Month')
                            ->options(
                                collect(range(1, 12))
                                    ->mapWithKeys(fn($m) => [
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

                // Tables\Actions\CreateAction::make(),

                Tables\Actions\Action::make('export')
                    ->label('Export Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(
                        fn() =>
                        Excel::download(
                            new StudentFeesExport(now()->format('Y-m')),
                            'student-fees.xlsx'
                        )
                    ),

                Tables\Actions\Action::make('import')
                    ->label('Import Excel')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->form([
                        Forms\Components\FileUpload::make('file')
                            ->required()
                            ->acceptedFileTypes(['.xlsx', '.xls', '.csv'])
                    ])
                    ->action(function (array $data) {
                        Excel::import(
                            new \App\Imports\StudentFeesImport,
                            storage_path('app/public/' . $data['file'])
                        );
                    }),

            ])

            ->actions([
                Tables\Actions\EditAction::make(),
                // Manual WhatsApp Web link
                // Tables\Actions\Action::make('whatsapp')
                // ->label('Send via WhatsApp')
                // ->icon('heroicon-o-chat-bubble-left-ellipsis')
                // ->url(function ($record) {
            
                //     if (!$record->student) {
                //         return '#';
                //     }
            
                //     $phone = preg_replace('/[^0-9]/', '', $record->student->mobile_no ?? '');
            
                //     if (!$phone) {
                //         return '#';
                //     }
            
                //     if (substr($phone, 0, 2) !== '91') {
                //         $phone = '91' . $phone;
                //     }
            
                //     $amount = number_format($record->fee_amount ?? 0, 2);
            
                //     $date = $record->received_on
                //         ? \Carbon\Carbon::parse($record->received_on)->format('d M Y')
                //         : '-';
            
                //     $name = trim(
                //         optional($record->student?->user)->firstname . ' ' .
                //         optional($record->student?->user)->lastname
                //     );
            
                //     // ✅ SAFE COURSE ACCESS
                //     $courseName = $record->course?->name ?? 'Course Not Assigned';
            
                //     $message = "Hello {$name},\n\n"
                //         . "We have received your fee payment.\n"
                //         . "Amount: ₹{$amount}\n"
                //         . "Date: {$date}\n"
                //         . "Course: {$courseName}\n\n"
                //         . "Thank you!";
            
                //     return "https://wa.me/{$phone}?text=" . urlencode($message);
                // })
                // ->openUrlInNewTab(),

                Tables\Actions\Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn($record) => route('fees.print', $record->id))
                    ->openUrlInNewTab(),
            ]);
    }

    /* ===========================
       PAGES
    ============================ */

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentFees::route('/'),
            'create' => Pages\CreateStudentFees::route('/create'),
            'edit' => Pages\EditStudentFees::route('/{record}/edit'),
        ];
    }

    /* ===================================
       Manual WhatsApp Link
    =================================== */

    protected function generateWhatsAppUrl($record): string
    {
        $phone = preg_replace('/[^0-9]/', '', $record->student->mobile_no ?? '');

        if (!$phone) {
            return '#';
        }

        if (substr($phone, 0, 2) !== '91') {
            $phone = '91' . $phone;
        }

        $amount = number_format($record->fee_amount, 2);
        $date = \Carbon\Carbon::parse($record->received_on)->format('d M Y');

        $message = "Hello {$record->student->name},\n\n"
            . "We have received your fee payment.\n"
            . "Amount: ₹{$amount}\n"
            . "Date: {$date}\n"
            . "Course: {$record->course->name}\n\n"
            . "Thank you!";

        return "https://wa.me/{$phone}?text=" . urlencode($message);
    }

    /* ===================================
       Auto WhatsApp API Send (AiSensy)
    =================================== */

    protected function sendWhatsAppMessage($record): void
    {
        try {

            $phone = preg_replace('/[^0-9]/', '', $record->student->mobile_no ?? '');

            if (!$phone) {
                logger()->error('Phone number empty');
                return;
            }

            if (substr($phone, 0, 2) !== '91') {
                $phone = '91' . $phone;
            }

            $fullName = preg_replace('/[^A-Za-z ]/', '', $record->student->full_name);
            $fullName = trim($fullName);

            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'Bearer ' . env('AISENSY_API_KEY'),
            ])->post('https://backend.aisensy.com/campaign/t1/api/v2', [

                "apiKey"       => env('AISENSY_API_KEY'),
                "campaignName" => "fee_confirmation_msg",
                "destination"  => $phone,

                // ✅ Mandatory clean username
                "userName"     => $fullName,

                "templateParams" => [
                    $fullName,
                    number_format($record->fee_amount, 2),
                    $record->course->name,
                ],
            ]);
            // 🔥 IMPORTANT — log full response
            logger()->info('AiSensy Response: ' . $response->body());

            if ($response->successful()) {
                \Filament\Notifications\Notification::make()
                    ->title('WhatsApp message sent successfully')
                    ->success()
                    ->send();
            } else {

                \Filament\Notifications\Notification::make()
                    ->title('WhatsApp sending failed')
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            logger()->error('WhatsApp API Error: ' . $e->getMessage());
        }
    }
}
