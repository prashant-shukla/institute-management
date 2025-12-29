<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment History</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            margin-bottom: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background: #f3f3f3;
        }
        .summary {
            margin-bottom: 15px;
        }
        .summary p {
            margin: 3px 0;
        }
    </style>
</head>
<body>

    <h2>Payment History</h2>

    <!-- STUDENT SUMMARY -->
    <div class="summary">
        <p><strong>Student:</strong> {{ $fullName }}</p>
        <p><strong>Total Fee:</strong> ₹{{ number_format($totalFee, 2) }}</p>
        <p><strong>Total Paid:</strong> ₹{{ number_format($totalPaid, 2) }}</p>
        <p><strong>Balance:</strong> ₹{{ number_format($balance, 2) }}</p>
    </div>

    <!-- COURSE WISE SUMMARY -->
    <table>
        <thead>
            <tr>
                <th>Course</th>
                <th>Course Fee</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $payment)
                <tr>
                   @php
    $course = \App\Models\Course::find($payment->course_id);
@endphp

<td>{{ $course->name ?? 'Course Not Found' }}</td>
<td>₹{{ number_format($course->offer_fee ?? 0, 2) }}</td>

                    <td>₹{{ number_format($payment->fee_amount, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No course payments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- PAYMENT TRANSACTIONS -->
    <h2 style="margin-top: 20px;">Payment Transactions</h2>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Mode</th>
                <th>Received On</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{ optional($payment->created_at)->format('Y-m-d') }}</td>
                    <td>₹{{ number_format($payment->fee_amount, 2) }}</td>
                    <td>{{ $payment->payment_mode ?? '-' }}</td>
                    <td>{{ $payment->received_on ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No payments recorded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
