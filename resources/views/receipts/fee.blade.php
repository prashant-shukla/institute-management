<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CADADDA Receipt</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        .receipt {
            padding: 15px 0;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
        }

        .company h2 {
            margin: 0;
            color: #007BFF;
        }

        .flex-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 25px;
        }

        .left-box p,
        .right-box p {
            margin: 4px 0;
            line-height: 1.6;
            font-size: 14px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .right-box {
            text-align: right;
        }

        .company p {
            margin: 4px 0;
            font-size: 13px;
        }

        .right {
            text-align: right;
        }

        .flex-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 6px;
            border: 1px solid #ccc;
            font-size: 13px;
        }

        th {
            text-align: left;

        }

        .received {
            margin-top: 15px;
            text-align: right;
            font-weight: bold;
        }

        .copy-label {
            text-align: right;
            font-size: 12px;
            font-weight: bold;
        }

        .divider {
            border-top: 1px dashed #000;
            margin: 25px 0;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    @php
    $student = $fee->student;
    $course = $fee->course;
    $user = $student?->user;

    $totalFee = $student->total_fee ?? 0;
    $courseFee = $student->course_fee ?? 0;
    $igst = $student->gst_amount ?? 0;

    $totalPaid = \App\Models\StudentFees::where('student_id', $fee->student_id)
    ->where('course_id', $fee->course_id)
    ->sum('fee_amount');

    $receivedAmount = $fee->fee_amount ?? 0;
    $dueAmount = max($totalFee - $totalPaid, 0);
    @endphp


    @for($i = 0; $i < 2; $i++)

        <div class="receipt">

        <div class="copy-label">
            {{ $i == 0 ? 'Office Copy' : 'Student Copy' }}
        </div>

        <!-- HEADER -->
        <div class="top-bar">
            <div class="company">
                <h2>CADADDA</h2>
                <p>8, Behind Mahaveer Complex, C Road</p>
                <p>Sardarpura, Jodhpur, Raj.</p>
                <p>+91 - 9261077888</p>
            </div>

            <div class="right">
                <h3>RECEIPT NO #{{ $fee->receipt_no }}</h3>
                <p>
                    Date:
                    {{ $fee->received_on
                    ? \Carbon\Carbon::parse($fee->received_on)->format('d/m/Y')
                    : '-' }}
                </p>
            </div>
        </div>

        <!-- RECEIPT TO + PAYMENT DETAILS -->
        <div class="flex-row">

            <!-- LEFT -->
            <div class="left-box" style="width:60%;">
                <div class="section-title">Receipt To:</div>

                <p><strong>{{ $user?->firstname }} {{ $user?->lastname }}</strong></p>
                <p>Father Name: {{ $student->father_name ?? '-' }}</p>
                <p>Reg No: {{ $student->reg_no ?? '-' }}</p>
                <p>{{ $student->correspondence_add ?? '-' }}</p>
            </div>

            <!-- RIGHT -->
            <div class="right-box" style="width:35%;">
                <div class="section-title">Payment Details:</div>

                <p>
                    Total Course Fee:
                    <strong>₹{{ number_format($totalFee, 2) }}</strong>
                </p>

                <p>
                    Total Received Amount:
                    <strong>₹{{ number_format($totalPaid, 2) }}</strong>
                </p>

                <p>
                    Current Due Amount:
                    <strong>₹{{ number_format($dueAmount, 2) }}</strong>
                </p>
            </div>

        </div>

        <!-- COURSE TABLE -->
        <table>
            <thead>
                <tr>
                    <th>Payment Description</th>
                    <th style="text-align:right;">Course Fee</th>
                    <th style="text-align:right;">IGST</th>
                    <th style="text-align:right;">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $course->name ?? '-' }}<br>
                        <small>{{ $course->short_description ?? '' }}</small>
                    </td>
                    <td style="text-align:right;">
                        ₹{{ number_format($courseFee, 2) }}
                    </td>
                    <td style="text-align:right;">
                        ₹{{ number_format($igst, 2) }}
                    </td>
                    <td style="text-align:right;">
                        ₹{{ number_format($totalFee, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- RECEIVED -->
        <div class="received">
            Received Amount: ₹{{ number_format($receivedAmount, 2) }}
        </div>

        </div>

        @if($i == 0)
        <div class="divider"></div>
        @endif

        @endfor

</body>

</html>