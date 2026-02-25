<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CADADDA Fee Receipt</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }

        .container {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 700px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .header-left h2 {
            margin: 0;
            color: #007BFF;
        }

        .header-left p {
            margin: 2px 0;
            font-size: 13px;
        }

        .header-right {
            text-align: right;
            font-size: 13px;
        }

        .section {
            margin-top: 20px;
        }

        .section h4 {
            margin-bottom: 8px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        th {
            background: #f8f8f8;
        }

        .summary {
            margin-top: 20px;
            text-align: right;
        }

        .summary p {
            margin: 5px 0;
        }

        .total {
            font-weight: bold;
            color: #007BFF;
        }

        .print-btn {
            text-align: right;
            margin-bottom: 10px;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

@php
    $student = $fee->student;
    $course  = $fee->course;
    $user    = $student?->user;

    $totalFee = $student->total_fee ?? 0;

    $totalPaid = \App\Models\StudentFees::where('student_id', $fee->student_id)
        ->where('course_id', $fee->course_id)
        ->sum('fee_amount');

    $receivedAmount = $fee->fee_amount ?? 0;
    $dueAmount = max($totalFee - $totalPaid, 0);

    $gstAmount = $fee->gst_amount ?? 0;
    $discountAmount = $fee->discount_amount ?? 0;
@endphp

<div class="container">

    <div class="print-btn">
        <button onclick="window.print()">🖨 Print</button>
    </div>

    <!-- ✅ HEADER (Same As You Wanted) -->
    <div class="header">
        <div class="header-left">
            <h2>CADADDA</h2>
            <p>8, Behind Mahaveer Complex, C Road, SardarPura, Jodhpur, Raj.</p>
            <p>📞 +91-9261077888</p>
        </div>

        <div class="header-right">
            <h3>Receipt No: {{ $fee->receipt_no ?? '-' }}</h3>

            <p>
                Date:
                {{ $fee->received_on 
                    ? \Carbon\Carbon\Carbon::parse($fee->received_on)->format('d/m/Y') 
                    : '-' 
                }}
            </p>

            @if(($gstAmount ?? 0) > 0)
                <p>GST No: 08DAZPK3683R1ZB</p>
            @endif
        </div>
    </div>

    <div class="section">
        <h4>Receipt To</h4>

        <p><strong>
            {{ $user ? $user->firstname . ' ' . $user->lastname : '-' }}
        </strong></p>

        <p>Father Name: {{ $student->father_name ?? '-' }}</p>
        <p>Reg. No: {{ $student->reg_no ?? '-' }}</p>
        <p>Address: {{ $student->correspondence_add ?? '-' }}</p>
    </div>

    <div class="section">
        <h4>Payment Description</h4>

        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Total Course Fee</th>
                    <th>Amount Received</th>
                    <th>GST</th>
                    <th>Discount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $course->name ?? '-' }} <br>
                        <small style="color:#777">
                            {{ $course->short_description ?? '' }}
                        </small>
                    </td>
                    <td>₹{{ number_format($totalFee, 2) }}</td>
                    <td>₹{{ number_format($receivedAmount, 2) }}</td>
                    <td>₹{{ number_format($gstAmount, 2) }}</td>
                    <td>₹{{ number_format($discountAmount, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="summary">
        <p>Total Course Fee: ₹{{ number_format($totalFee, 2) }}</p>
        <p>Total Paid Till Now: ₹{{ number_format($totalPaid, 2) }}</p>
        <p class="total">Current Due: ₹{{ number_format($dueAmount, 2) }}</p>
    </div>

</div>

</body>
</html>