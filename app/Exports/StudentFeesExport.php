<?php

namespace App\Exports;

use App\Models\StudentFees;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentFeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return StudentFees::with(['student', 'course'])
            ->get()
            ->map(function ($fee) {
                return [
                    'Reg No'       => $fee->student->reg_no ?? '',
                    // 'Student Name' => $fee->student->name ?? '',
                    'Course'       => $fee->course->name ?? '',
                    'Amount'       => $fee->fee_amount,
                    'Date'         => $fee->received_on,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Reg No',
            // 'Student Name',
            'Course',
            'Amount',
            'Date',
        ];
    }
}