<?php

namespace App\Imports;

use App\Models\StudentFees;
use App\Models\Student;
use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentFeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new StudentFees([
            'receipt_no'   => $row['receipt_no'] ?? null,
            'student_id'   => Student::where('reg_no', $row['reg_no'])->value('id'),
            'course_id'    => Course::where('name', $row['course'])->value('id'),
            'fee_amount'   => $row['amount'],
            'received_on'  => $row['date'],
            'payment_mode' => strtolower($row['payment_mode']),
            'remark'       => $row['remark'] ?? null,
        ]);
    }
}