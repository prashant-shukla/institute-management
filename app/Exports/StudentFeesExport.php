<?php

namespace App\Exports;

use App\Models\StudentFees;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentFeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return StudentFees::with(['student.user', 'course'])
            ->get()
            ->map(function ($fee) {

                $student = $fee->student;
                $user    = $student?->user;
                $course  = $fee->course;

                $baseAmount     = $fee->fee_amount ?? 0;
                $gstAmount      = $fee->gst_amount ?? 0;
                $discountAmount = $fee->discount_amount ?? 0;

                // Total Fee Formula
                $totalFee = ($baseAmount + $gstAmount) - $discountAmount;

                // Amount Collected (Actual Paid Now)
                $amountCollected = $fee->fee_amount ?? 0;

                return [
                    'Reg No'            => $student->reg_no ?? '',
                    'Student Name'      => $user ? $user->firstname . ' ' . $user->lastname : '',
                    'Course'            => $course->name ?? '',
                    'Total Fee'         => $totalFee,
                    'Amount Collected'  => $amountCollected,
                    'GST Amount'        => $gstAmount,
                    'Discount'          => $discountAmount,
                    'Date'              => $fee->received_on,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Reg No',
            'Student Name',
            'Course',
            'Total Fee',
            'Amount Collected',
            'GST Amount',
            'Discount',
            'Date',
        ];
    }
}